<?php
require(ROOT . 'libs/htmlparser.inc');

class pdfController extends Controller
{    
    private $_pdf;
    private $_dbpdf;
    public $_data; 
    var $B;
    var $I;
    var $U;
    var $HREF;
    
    public function __construct() {
        parent::__construct();        
        $this->_dbpdf = $this->loadModel('legajo');
        
        $this->_data = array();
        $this->B=0;
        $this->I=0;
        $this->U=0;
        $this->HREF='';
        
        $this->getLibrary('class.fpdf');
        $this->_pdf =& new FPDF('L', 'mm', 'A4');
        
    }
   
    public function index(){} 

    function WriteHTML2($html)
    {
        //HTML parser
        $html=str_replace("\n",' ',$html);
        $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->_pdf->Write(5,$e);
            }
            else
            {
                //Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    //Extract attributes
                    $a2=explode(' ',$e);
                    $tag=strtoupper(array_shift($a2));
                    $attr=array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])]=$a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        //Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF=$attr['HREF'];
        if($tag=='BR')
            $this->_pdf->Ln(5);
        if($tag=='P')
            $this->_pdf->Ln(10);
    }

    function CloseTag($tag)
    {
        //Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF='';
        if($tag=='P')
            $this->_pdf->Ln(10);
    }

    function SetStyle($tag, $enable)
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
            if($this->$s>0)
                $style.=$s;
        $this->_pdf->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        //Put a hyperlink
        $this->_pdf->SetTextColor(0,0,255);
        $this->_pdf->SetStyle('U',true);
        $this->_pdf->Write(5,$txt,$URL);
        $this->_pdf->SetStyle('U',false);
        $this->_pdf->SetTextColor(0);
    }

    function WriteTable($data, $w)
    {
        $this->_pdf->SetLineWidth(.3);
        $this->_pdf->SetFillColor(255,255,255);
        $this->_pdf->SetTextColor(0);
        $this->_pdf->SetFont('');
            
        foreach($data as $row)
        {
            $nb=0;
            for($i=0;$i<count($row);$i++)
                $nb=max($nb,$this->NbLines($w[$i],trim($row[$i])));
            $h=5*$nb;
            $this->CheckPageBreak($h);
            for($i=0;$i<count($row);$i++)
            {
                $x=$this->_pdf->GetX();
                $y=$this->_pdf->GetY();
                $this->_pdf->Rect($x,$y,$w[$i],$h);
                $this->_pdf->MultiCell($w[$i],5,trim($row[$i]),0,'L');
                //$this->CellFitSpace($w[$i],5,trim($row[$i]),0,'L',1);
                //Put the position to the right of the cell
                $this->_pdf->SetXY($x+$w[$i],$y);                    
            }
            $this->_pdf->Ln($h);

        }
    }

    function NbLines($w, $txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->_pdf->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->_pdf->rMargin-$this->x;
        $wmax=($w-2*$this->_pdf->cMargin)*1000/$this->_pdf->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->_pdf->GetY()+$h>$this->_pdf->PageBreakTrigger)
            $this->_pdf->AddPage($this->_pdf->CurOrientation);
    }

    function ReplaceHTML($html)
    {
        $html = str_replace( '<li>', "\n<br> - " , $html );
        $html = str_replace( '<LI>', "\n - " , $html );
        $html = str_replace( '</ul>', "\n\n" , $html );
        $html = str_replace( '<strong>', "<b>" , $html );
        $html = str_replace( '</strong>', "</b>" , $html );
        $html = str_replace( '&#160;', "\n" , $html );
        $html = str_replace( '&nbsp;', " " , $html );
        $html = str_replace( '&quot;', "\"" , $html ); 
        $html = str_replace( '&#39;', "'" , $html );
        return $html;
    }

    function ParseTable($Table)
    {
        $_var='';
        $htmlText = $Table;
        $parser = new HtmlParser ($htmlText);
        while ($parser->parse())
        {
            if(strtolower($parser->iNodeName)=='table')
            {
                if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
                    $_var .='/::';
                else
                    $_var .='::';
            }

            if(strtolower($parser->iNodeName)=='tr')
            {
                if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
                    $_var .='!-:'; //opening row
                else
                    $_var .=':-!'; //closing row
            }
            if(strtolower($parser->iNodeName)=='td' && $parser->iNodeType == NODE_TYPE_ENDELEMENT)
            {
                $_var .='#,#';
            }
            if ($parser->iNodeName=='Text' && isset($parser->iNodeValue))
            {
                $_var .= $parser->iNodeValue;
            }
        }
        $elems = explode(':-!',str_replace('/','',str_replace('::','',str_replace('!-:','',$_var)))); //opening row
        foreach($elems as $key=>$value)
        {
            if(trim($value)!='')
            {
                $elems2 = explode('#,#',$value);
                array_pop($elems2);
                $data[] = $elems2;
            }
        }
        return $data;
    }

    function WriteHTML($html)
    {
        $html = $this->ReplaceHTML($html);
        //Search for a table
        $start = strpos(strtolower($html),'<table');
        $end = strpos(strtolower($html),'</table');
        if($start!==false && $end!==false)
        {
            $this->WriteHTML2(substr($html,0,$start).'<BR>');

            $tableVar = substr($html,$start,$end-$start);
            $tableData = $this->ParseTable($tableVar);
            for($i=1;$i<=count($tableData[0]);$i++)
            {
                if($this->_pdf->CurOrientation=='L')
                    $w[] = abs(50/(count($tableData[0])-1))+24;
                else
                    $w[] = abs(120/(count($tableData[0])-1))+5;
            }
            $this->WriteTable($tableData,$w);

            $this->WriteHTML2(substr($html,$end+8,strlen($html)-1).'<BR>');
        }
        else
        {
            $this->WriteHTML2($html);
        }
    }  
   
    public function pdf1()
    {
            //echo FPDF_FONTPATH;exit;
        
            $this->_data = $this->_dbpdf->getReportByNum(1);
            $header = array('Tipo', 'Caract', 'Núm', 'Año', 'Fecha','Recibido','Remitido','Ref','Detalle');
            //$this->_pdf->Image(ROOT . 'public/img/pdf/Logo.png',10,10,-300);
            $this->_pdf->AddPage();
            $this->_pdf->SetFont('Arial','B',16);
            //$this->_pdf->Cell(40,10, 'Hola Mundo');
            $this->FancyTable($header, $this->_data);
            $this->_pdf->Output();
       
    }
    
    public function printDetalle($topdf='')
    {
        
        if(!empty($topdf)){
            $this->_data = $this->_dbpdf->getDetalle($topdf);
            $this->_pdf->AddPage();
            $this->_pdf->SetFont('Arial','B',16);
            $this->_pdf->Cell(40,10, utf8_decode($this->_data));
            $this->_pdf->Output();
        }
    }
    
    public function pdf2()
    {
        $this->_data = $this->_dbpdf->getReportByNum(1);
        //print_r($this->_data);echo "<br>" .count($this->_data);exit;
        $htmlTable='<br><TABLE>
        <TR>
        <TD>FECHA</TD>
        <TD>RECIBIDO</TD>
        <TD>REMITIDO</TD>
        <TD>REF</TD>
        <TD>DETALLE</TD>
        </TR>';

        for($i=0; $i < count($this->_data); $i++)
        {
            $htmlTable.="<TR>"                        
                        . "<TD>" . $this->_data[$i]['fecha_mov'] . "</TD>"
                        . "<TD>" . $this->_data[$i]['recibido'] . "</TD>"
                        . "<TD>" . $this->_data[$i]['remitido'] . "</TD>"
                        . "<TD>" . $this->_data[$i]['referente'] . "</TD>"
                        . "<TD>" . $this->_data[$i]['detalle'] . "</TD>"
                        . "</TR>";
        }
        
        $htmlTable.='</TABLE>';

        $this->_pdf->AddPage();
        $this->_pdf->SetFont('Arial','',10);
        $this->_pdf->Image(ROOT . 'public/img/encabezado.png',1,1,300,25);
        
        if($this->_data[0]['tipo'] == 'EXPEDIENTE')
        {
            $c = $this->_data[0]['exp_caracteristica']."-";
        }else{
            $c = '';
        }
        $this->WriteHTML("<BR><BR><BR><BR><BR><STRONG><U>REMITO</U></STRONG><BR>"
                           ."<p>" . $this->_data[0]['tipo'] . "  "
                           . $c
                           . $this->_data[0]['tipo_num'] . "/"
                           . $this->_data[0]['year'] . "</p> " 
                           ."$htmlTable<BR>"
                           ."Departamento de Personal<BR>Direccion Provincial de Salud Penitenciaria");
        $this->_pdf->Output();
    }
}

?>
