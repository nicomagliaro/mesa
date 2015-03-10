<?php
require(ROOT . 'libs/htmlparser.inc');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reportesController
 *
 * @author nico
 */

class reportesController extends Controller
{    
    public $_pdf;
    var $B;
    var $I;
    var $U;
    var $HREF;
    
    public function __construct() 
    {
        parent::__construct();
        
        if(!Session::get('autenticado'))
        {
        	 $this->redireccionar('error/access/5050');
        }        
        
        $this->getLibrary('class.fpdf');
        $this->_pdf =& new FPDF( 'p', 'mm', 'A4' );
    }
    
    public function index() {
        
    }
    
    function Header()
    {
        // Logo
        $this->_pdf->Image(ROOT . 'public/img/encabezado.png',1,1,200,20);
        // Arial bold 15
        $this->_pdf->Ln(20);
        $this->_pdf->SetFont('Arial','B',10);
        // Movernos a la derecha
        $this->_pdf->Cell(80);
        // Título
        $this->_pdf->Cell(30,10,'REMITO',1,0,'C');
        $this->_pdf->Ln(1);
        $this->_pdf->Cell(0,10,'Fecha: '. date("d/m/Y"),0,0,'L');
        $this->_pdf->Ln(3);
        $this->_pdf->Cell(0,10,'Hora: ' . date("g:i a"),0,0,'L');
        // Salto de línea
        $this->_pdf->Ln(5);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->_pdf->SetY(260);
        // Arial italic 8
        $this->_pdf->SetFont('Arial','I',8);
        // Número de página
        $this->_pdf->Cell(0,10,'Departamento de Personal',0,0,'L');
        $this->_pdf->Ln(3);
        $this->_pdf->Cell(0,10,'Direccion Provincial de Salud Penitenciaria',0,0,'L');
        $this->_pdf->Ln(3);
        $this->_pdf->Cell(0,10,'Pag. '.$this->_pdf->PageNo().'/{nb}',0,0,'C');
    }
    
    // Cargar los datos
    function LoadData($file)
    {
        // Leer las líneas del fichero
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

    // Tabla simple
    function BasicTable($header, $data)
    {
        // Cabecera
        foreach($header as $col)
            $this->_pdf->Cell(40,7,$col,1);
        $this->_pdf->Ln();
        // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->_pdf->Cell(40,6,$col,1);
            $this->_pdf->Ln();
        }
    }

    // Una tabla más completa
    function ImprovedTable($header, $data)
    {
        // Anchuras de las columnas
        $w = array(40, 35, 45, 40);
        // Cabeceras
        for($i=0;$i<count($header);$i++)
            $this->_pdf->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->_pdf->Ln();
        // Datos
        foreach($data as $row)
        {
            $this->_pdf->Cell($w[0],6,$row[0],'LR');
            $this->_pdf->Cell($w[1],6,$row[1],'LR');
            $this->_pdf->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
            $this->_pdf->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
            $this->_pdf->Ln();
        }
        // Línea de cierre
        $this->_pdf->Cell(array_sum($w),0,'','T');
    }

    // Tabla coloreada
    function FancyTable($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->_pdf->SetFillColor(255,0,0);
        $this->_pdf->SetTextColor(255);
        $this->_pdf->SetDrawColor(128,0,0);
        $this->_pdf->SetLineWidth(.3);
        $this->_pdf->SetFont('','B');
        // Cabecera
        $w = array(40, 35, 45, 40);
        for($i=0;$i<count($header);$i++)
            $this->pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->_pdf->Ln();
        // Restauración de colores y fuentes
        $this->_pdf->SetFillColor(224,235,255);
        $this->_pdf->SetTextColor(0);
        $this->_pdf->SetFont('');
        // Datos
        $fill = false;
        foreach($data as $row)
        {
            $this->_pdf->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->_pdf->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->_pdf->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
            $this->_pdf->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
            $this->_pdf->Ln();
            $fill = !$fill;
        }
        // Línea de cierre
        $this->_pdf->Cell(array_sum($w),0,'','T');
    }
    
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
        //$this->_pdf->SetFillColor(255,255,255);
        //$this->_pdf->SetTextColor(0);
        $this->_pdf->SetFillColor(160,160,160);
        $this->_pdf->SetTextColor(0);
        $this->_pdf->SetDrawColor(64,64,64);
        $this->_pdf->SetFont('Arial','',8);
            
        foreach($data as $row)
        {
            $nb=0;
            for($i=0;$i<count($row);$i++)
                $nb=max($nb,$this->NbLines($w[$i],trim($row[$i])));
            $h=5*$nb;
            $this->CheckPageBreak($h);
            $fill = false;
            for($i=0;$i<count($row);$i++)
            {
                $x=$this->_pdf->GetX();
                $y=$this->_pdf->GetY();
                $this->_pdf->Rect($x,$y,$w[$i],$h);
                $this->_pdf->MultiCell($w[$i],5,trim($row[$i]),0,'L',$fill);
                //$this->CellFitSpace($w[$i],5,trim($row[$i]),0,'L',1);
                //Put the position to the right of the cell
                $this->_pdf->SetXY($x+$w[$i],$y);
                $fill=!$fill;
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
        $html = str_replace( '&sol;', "/" , $html );
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
            $this->Header();
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
            $this->_pdf->Ln(5);
            $this->_pdf->write(5,'FIRMA:      ............................                                           RECIBIO:    ............................');
            $this->_pdf->Ln(8);
            $this->_pdf->Write(5,'ACLARACION: ............................                                    FIRMA:      ............................');
            $this->_pdf->Ln(8);
            $this->_pdf->Write(5,'                                                                                         ACLARACION: ............................');
            $this->_pdf->Ln(5);
            $this->Footer();
        }
        else
        {
            $this->Header();
            $this->WriteHTML2($html);
            $this->Footer();
        }
    }  
    
    public function getRef(array $data, $k) {
        if($data[$k]['tipo'] == 'EXPEDIENTE')
        {
            $ref = $data[$k]['exp_caracteristica']. "-" .$data[$k]['tipo_num'] . " \ " . $data[$k]['year'] . " (Alc: " . $data[$k]['alcance'].")";
            return $ref;
            
        }else{
            return $data[$k]['tipo_num'] . " \ " . $data[$k]['year'];
        }
    }
   
}

?>