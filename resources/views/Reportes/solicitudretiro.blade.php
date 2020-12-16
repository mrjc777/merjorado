<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Formulario de Seguimiento</title>   
	<style>
		/** Define the margins of your page **/
		@page {
                margin: 0 2.5cm 0 2.5cm;
            }

            header {
                position: fixed;
                top: 5px;
                left: 0px;
                right: 0px;
				float: left;
                /** Extra personal styles **/
                
            }
			.titulos{
				/*margin-top: 120px;*/
				margin-bottom: 10px;
				text-align: center;
				font-family: Tahoma, Arial, Helvetica, sans-serif;
				font-size: 14px;
				padding-top: 5px;
				position: relative;
				font-weight: bold;
			}
			.titulos-subrayado{
				text-align: center;
				font-family: Tahoma, Arial, Helvetica, sans-serif;
				font-size: 16px;
				padding-top: 5px;
				position: relative;
				font-weight: bold;
				text-decoration: underline;
			}
			.page-break {
			page-break-before: always;
		}
		p.MsoNormal, li.MsoNormal, div.MsoNormal
			{margin-top:0cm;
			margin-right:0cm;
			margin-bottom:8.0pt;
			margin-left:0cm;
			line-height:107%;
			font-size:11.0pt;
			font-family:"Calibri","sans-serif";}
		h1
			{mso-style-link:"Título 1 Car";
			margin-top:12.0pt;
			margin-right:0cm;
			margin-bottom:0cm;
			margin-left:0cm;
			margin-bottom:.0001pt;
			line-height:107%;
			page-break-after:avoid;
			font-size:16.0pt;
			font-family:"Calibri Light","sans-serif";
			color:#2E74B5;
			font-weight:normal;}
		h2
			{mso-style-link:"Título 2 Car";
			margin-right:0cm;
			margin-left:0cm;
			font-size:13.5pt;
			font-family:"Times New Roman","serif";
			color:black;
			font-weight:bold;}
		p.MsoFootnoteText, li.MsoFootnoteText, div.MsoFootnoteText
			{mso-style-link:"Texto nota pie Car";
			margin:0cm;
			margin-bottom:.0001pt;
			font-size:10.0pt;
			font-family:"Calibri","sans-serif";}
		p.MsoHeader, li.MsoHeader, div.MsoHeader
			{mso-style-link:"Encabezado Car";
			margin:0cm;
			margin-bottom:.0001pt;
			font-size:11.0pt;
			font-family:"Calibri","sans-serif";}
		p.MsoFooter, li.MsoFooter, div.MsoFooter
			{mso-style-link:"Pie de página Car";
			margin:0cm;
			margin-bottom:.0001pt;
			font-size:11.0pt;
			font-family:"Calibri","sans-serif";}
		span.MsoFootnoteReference
			{vertical-align:super;}
		p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
			{mso-style-link:"Texto independiente Car";
			margin-top:0cm;
			margin-right:0cm;
			margin-bottom:6.0pt;
			margin-left:0cm;
			font-size:10.0pt;
			font-family:"Arial","sans-serif";}
		a:link, span.MsoHyperlink
			{color:blue;
			text-decoration:underline;}
		a:visited, span.MsoHyperlinkFollowed
			{color:purple;
			text-decoration:underline;}
		p
			{margin-right:0cm;
			margin-left:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
			{mso-style-link:"Texto de globo Car";
			margin:0cm;
			margin-bottom:.0001pt;
			font-size:9.0pt;
			font-family:"Segoe UI","sans-serif";}
		p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
			{margin-top:0cm;
			margin-right:0cm;
			margin-bottom:8.0pt;
			margin-left:36.0pt;
			line-height:107%;
			font-size:11.0pt;
			font-family:"Calibri","sans-serif";}
		p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
			{margin-top:0cm;
			margin-right:0cm;
			margin-bottom:0cm;
			margin-left:36.0pt;
			margin-bottom:.0001pt;
			line-height:107%;
			font-size:11.0pt;
			font-family:"Calibri","sans-serif";}
		p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
			{margin-top:0cm;
			margin-right:0cm;
			margin-bottom:0cm;
			margin-left:36.0pt;
			margin-bottom:.0001pt;
			line-height:107%;
			font-size:11.0pt;
			font-family:"Calibri","sans-serif";}
		p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
			{margin-top:0cm;
			margin-right:0cm;
			margin-bottom:8.0pt;
			margin-left:36.0pt;
			line-height:107%;
			font-size:11.0pt;
			font-family:"Calibri","sans-serif";}
		span.EncabezadoCar
			{mso-style-name:"Encabezado Car";
			mso-style-link:Encabezado;}
		span.PiedepginaCar
			{mso-style-name:"Pie de página Car";
			mso-style-link:"Pie de página";}
		span.Ttulo2Car
			{mso-style-name:"Título 2 Car";
			mso-style-link:"Título 2";
			font-family:"Times New Roman","serif";
			color:black;
			font-weight:bold;}
		span.TextonotapieCar
			{mso-style-name:"Texto nota pie Car";
			mso-style-link:"Texto nota pie";}
		span.TextodegloboCar
			{mso-style-name:"Texto de globo Car";
			mso-style-link:"Texto de globo";
			font-family:"Segoe UI","sans-serif";}
		span.Ttulo1Car
			{mso-style-name:"Título 1 Car";
			mso-style-link:"Título 1";
			font-family:"Calibri Light","sans-serif";
			color:#2E74B5;}
		p.Estilopredeterminado, li.Estilopredeterminado, div.Estilopredeterminado
			{mso-style-name:"Estilo predeterminado";
			margin-top:0cm;
			margin-right:0cm;
			margin-bottom:10.0pt;
			margin-left:0cm;
			line-height:115%;
			font-size:11.0pt;
			font-family:"Calibri","sans-serif";
			color:#00000A;}
		p.msonormal0, li.msonormal0, div.msonormal0
			{mso-style-name:msonormal;
			margin-right:0cm;
			margin-left:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		span.TextoindependienteCar
			{mso-style-name:"Texto independiente Car";
			mso-style-link:"Texto independiente";
			font-family:"Arial","sans-serif";}
		p.Standard, li.Standard, div.Standard
			{mso-style-name:Standard;
			margin:0cm;
			margin-bottom:.0001pt;
			text-autospace:ideograph-other;
			font-size:12.0pt;
			font-family:"Liberation Serif","serif";}
		p.xl65, li.xl65, div.xl65
			{mso-style-name:xl65;
			margin-right:0cm;
			margin-left:0cm;
			background:white;
			font-size:9.0pt;
			font-family:"Arial","sans-serif";}
		p.xl66, li.xl66, div.xl66
			{mso-style-name:xl66;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:white;
			font-size:9.0pt;
			font-family:"Arial","sans-serif";}
		p.xl67, li.xl67, div.xl67
			{mso-style-name:xl67;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#B1A0C7;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl68, li.xl68, div.xl68
			{mso-style-name:xl68;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:white;
			font-size:9.0pt;
			font-family:"Arial","sans-serif";}
		p.xl69, li.xl69, div.xl69
			{mso-style-name:xl69;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#B1A0C7;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl70, li.xl70, div.xl70
			{mso-style-name:xl70;
			margin-right:0cm;
			margin-left:0cm;
			background:#B1A0C7;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl71, li.xl71, div.xl71
			{mso-style-name:xl71;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#B1A0C7;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl72, li.xl72, div.xl72
			{mso-style-name:xl72;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#B1A0C7;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl73, li.xl73, div.xl73
			{mso-style-name:xl73;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl74, li.xl74, div.xl74
			{mso-style-name:xl74;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl75, li.xl75, div.xl75
			{mso-style-name:xl75;
			margin-right:0cm;
			margin-left:0cm;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl76, li.xl76, div.xl76
			{mso-style-name:xl76;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl77, li.xl77, div.xl77
			{mso-style-name:xl77;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl78, li.xl78, div.xl78
			{mso-style-name:xl78;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl79, li.xl79, div.xl79
			{mso-style-name:xl79;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl80, li.xl80, div.xl80
			{mso-style-name:xl80;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl81, li.xl81, div.xl81
			{mso-style-name:xl81;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl82, li.xl82, div.xl82
			{mso-style-name:xl82;
			margin-right:0cm;
			margin-left:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl83, li.xl83, div.xl83
			{mso-style-name:xl83;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl84, li.xl84, div.xl84
			{mso-style-name:xl84;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl85, li.xl85, div.xl85
			{mso-style-name:xl85;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl86, li.xl86, div.xl86
			{mso-style-name:xl86;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl87, li.xl87, div.xl87
			{mso-style-name:xl87;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#B1A0C7;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl88, li.xl88, div.xl88
			{mso-style-name:xl88;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#B1A0C7;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl89, li.xl89, div.xl89
			{mso-style-name:xl89;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#B1A0C7;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl90, li.xl90, div.xl90
			{mso-style-name:xl90;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl91, li.xl91, div.xl91
			{mso-style-name:xl91;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl92, li.xl92, div.xl92
			{mso-style-name:xl92;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl93, li.xl93, div.xl93
			{mso-style-name:xl93;
			margin-right:0cm;
			margin-left:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";}
		p.xl94, li.xl94, div.xl94
			{mso-style-name:xl94;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#E4DFEC;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl95, li.xl95, div.xl95
			{mso-style-name:xl95;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#E4DFEC;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		p.xl96, li.xl96, div.xl96
			{mso-style-name:xl96;
			margin-right:0cm;
			margin-left:0cm;
			text-align:center;
			background:#E4DFEC;
			border:none;
			padding:0cm;
			font-size:12.0pt;
			font-family:"Times New Roman","serif";
			font-weight:bold;}
		.MsoChpDefault
			{font-family:"Calibri","sans-serif";}
		.MsoPapDefault
			{margin-bottom:8.0pt;
			line-height:107%;}
		/* Page Definitions */
		@page WordSection1
			{size:612.0pt 792.0pt;
			margin:98.35pt 3.0cm 70.9pt 3.0cm;}
		div.WordSection1
			{page:WordSection1;}
		/* List Definitions */
		ol
			{margin-bottom:0cm;}
		ul
			{margin-bottom:0cm;}
	</style>
</head>
<body>
	<header>
	<table width="100%">
	        <tr>
	            <td align="left" width="50%"><img src="{{ asset('assets/img/logo_vice.jpg') }}" width="140px" height="140px"/></td>
	            <td align="right" width="50%"><img src="{{ asset('assets/img/logo.jpg') }}" width="120px" height="50px"/></td>
	        </tr>
    </table>
	</header>
	<div class="titulos">
			<h3>RÉGIMEN DE ADMISIÓN TEMPORAL PARA <br>
		PERFECCIONAMIENTO ACTIVO - RITEX</h3>
	</div>		
	<div class="titulos-subrayado">
			<h3>FORMULARIO DE SOLICITUD DE RETIRO VOLUNTARIO</h3>
	</div>
	<table class="MsoTableGrid" cellspacing="0" cellpadding="0"
		style="border-collapse:collapse;border:none">
		<tr style="height:27.15pt">
		<td width="144" style="width:106.1pt;border:solid windowtext 0.5pt;background:
		#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:27.15pt">
		<p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
		margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
		lang=EN-US style='font-family:"Tahoma","sans-serif"'>SOLICITUD N°</span></b></p>
		</td>
		<td width=154 style='width:4.0cm;border:solid windowtext 0.5pt;border-left:
		none;padding:0cm 5.4pt 0cm 5.4pt;height:27.15pt'>
		<p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
		margin-bottom:.0001pt;text-align:center;line-height:normal'><span lang=EN-US
		style='font-family:"Tahoma","sans-serif"'><?= $data['codigo_solicitud']; ?></span></p>
		</td>
		<td width=135 style='width:99.2pt;border:solid windowtext 0.5pt;border-left:
		none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:27.15pt'>
		<p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
		margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
		lang=EN-US style='font-family:"Tahoma","sans-serif"'>DE FECHA</span></b></p>
		</td>
		<td width=125 style='width:92.15pt;border:solid windowtext 0.5pt;border-left:
		none;padding:0cm 5.4pt 0cm 5.4pt;height:27.15pt'>
		<p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
		margin-bottom:.0001pt;text-align:center;line-height:normal'><span lang=EN-US
		style='font-family:"Tahoma","sans-serif"'><?= $data['solicitud_fecha']; ?></span></p>
		</td>
		</tr>
		</table>

		<!--ESPACIO DE TRABAJO PARA DATOS GENERALES--->
		<br>
		<br>

<p class=MsoListParagraph style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;text-indent:-36.0pt;line-height:normal;border:none'><b><span
style='font-family:"Tahoma","sans-serif"'>I.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></b><b><span style='font-family:"Tahoma","sans-serif"'>DATOS
GENERALES</span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;border:none'><span style='font-family:"Tahoma","sans-serif"'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=608
 style='width:446.55pt;margin-left:-.25pt;border-collapse:collapse;border:none'>
 <tr style='height:17.0pt'>
  <td width=251 valign=top style='width:184.3pt;border-top:solid windowtext 0.5pt;
  border-left:solid windowtext 0.5pt;border-bottom:none;border-right:none;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Razón Social:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border-top:solid windowtext 0.5pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif";
  color:black'>FABRICA DE FUSTES Y SOMBREROS BURCAL S.R.L</span></p>
  </td>
 </tr>
 <tr style='height:17.0pt'>
  <td width=251 valign=top style='width:184.3pt;border:none;border-left:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Domicilio Fiscal:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>ZONA
  PARQUE INDUSTRIAL UV 0PI MZN 31</span></p>
  </td>
 </tr>
 <tr style='height:17.0pt'>
  <td width=251 valign=top style='width:184.3pt;border:none;border-left:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Departamento:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>La
  Paz</span></p>
  </td>
 </tr>
 <tr style='height:17.0pt'>
  <td width=251 valign=top style='width:184.3pt;border:none;border-left:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Ciudad:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>El
  Alto</span></p>
  </td>
 </tr>
 <tr style='height:17.0pt'>
  <td width=251 valign=top style='width:184.3pt;border:none;border-left:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Teléfono:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>72876667</span></p>
  </td>
 </tr>
 <tr style='height:17.0pt'>
  <td width=251 valign=top style='width:184.3pt;border:none;border-left:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Correo Electrónico:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>eg_heras@hotmail.com</span></p>
  </td>
 </tr>
 <tr style='height:17.0pt'>
  <td width=251 valign=top style='width:184.3pt;border-top:none;border-left:
  solid windowtext 0.5pt;border-bottom:solid windowtext 0.5pt;border-right:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Actividad:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>XII.-
  CALZADOS, SOMBREROS Y DEMAS TOCADOS, PARAGUAS, QUITASOLES, BSTONES, LATIGOS,
  FUSTAS Y SUS PARTES, PLUMAS PREPARADAS Y ARTICULOS DE PLUMAS, FLORES
  ARTIFICIALES.</span></p>
  </td>
 </tr>
</table>
<br>
<br>
<!--ESPACIO DE TRABAJO DE DOCUMENTOS LEGALES-->
<p class=MsoListParagraph style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;text-indent:-36.0pt;line-height:normal;border:none'><b><span
style='font-family:"Tahoma","sans-serif"'>II.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></b><b><span style='font-family:"Tahoma","sans-serif"'>DOCUMENTOS
LEGALES</span></b></p>

<p class=MsoNormalCxSpFirst style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><span lang=EN-US style='font-family:
"Tahoma","sans-serif"'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=608
 style='width:446.55pt;margin-left:-.25pt;border-collapse:collapse;border:none'>
 <tr style='height:19.85pt'>
  <td width=251 valign=top style='width:184.3pt;border-top:solid windowtext 0.5pt;
  border-left:solid windowtext 0.5pt;border-bottom:none;border-right:none;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Número de RUEX:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border-top:solid windowtext 0.5pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>21664</span></p>
  </td>
 </tr>
 <tr style='height:19.85pt'>
  <td width=251 valign=top style='width:184.3pt;border:none;border-left:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>NIT:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>157728024</span></p>
  </td>
 </tr>
 <tr style='height:19.85pt'>
  <td width=251 valign=top style='width:184.3pt;border:none;border-left:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Matrícula de Comercio:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>165987</span></p>
  </td>
 </tr>
 <tr style='height:19.85pt'>
  <td width=251 valign=top style='width:184.3pt;border:none;border-left:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Nombre del Representante Legal:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border:none;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>ERICK
  ORLANDO BURGOS CALVO</span></p>
  </td>
 </tr>
 <tr style='height:19.85pt'>
  <td width=251 valign=top style='width:184.3pt;border-top:none;border-left:
  solid windowtext 0.5pt;border-bottom:solid windowtext 0.5pt;border-right:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Tahoma","sans-serif"'>Cédula de Identidad:</span></b></p>
  </td>
  <td width=357 valign=top style='width:262.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>3430880</span></p>
  </td>
 </tr>
</table>
<br>
<br>
<!--ESPACIO DE TRABAJO INSTALACIONES Y DEPOSITOS-->
<p class=MsoListParagraph style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;text-indent:-36.0pt;line-height:normal;border:none'><b><span
style='font-family:"Tahoma","sans-serif"'>III.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></b><b><span style='font-family:"Tahoma","sans-serif"'>INSTALACIONES
Y DEPÓSITOS</span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;border:none'><span style='font-family:"Tahoma","sans-serif"'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=300 style='width:220.7pt;border:solid windowtext 0.5pt;background:
  #BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:14.0pt'>Dirección</span></b></p>
  </td>
  <td width=300 style='width:220.7pt;border:solid windowtext 0.5pt;border-left:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:14.0pt'>Tipo</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=300 style='width:220.7pt;border:solid windowtext 0.5pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>CALLE MONSEÑOR SANTILLAN S/N , ENTRE
  CALLES TARIJA Y EMMO REYES</p>
  </td>
  <td width=300 style='width:220.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Instalación</p>
  </td>
 </tr>
</table>
	<div class="page-break"></div>
	
<!--ESPACIO DETALLES DE MATERIAS PRIMAS-->
<p class=MsoListParagraph><b>IV.</b><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></b><b><span style='font-family:"Tahoma","sans-serif"'>MATERIAS
PRIMAS Y BIENES INTERMEDIOS </span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;border:none'><span style='font-family:"Tahoma","sans-serif"'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:13.95pt;border-collapse:collapse;border:none'>
 <tr style='height:23.75pt'>
  <td width=40 nowrap style='width:50pt;border:solid windowtext 0.5pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=EstilopredeterminadoCxSpFirst align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>Código</span></b></p>
  </td>
  <td width=120 nowrap style='width:4.0cm;border:solid windowtext 0.5pt;
  border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=EstilopredeterminadoCxSpMiddle align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>Partida
  Arancelaria</span></b></p>
  </td>
  <td width=222 nowrap style='width:163.05pt;border:solid windowtext 0.5pt;
  border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=EstilopredeterminadoCxSpMiddle align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>Descripción</span></b></p>
  </td>
  <td width=74 nowrap style='width:54.45pt;border:solid windowtext 0.5pt;
  border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=EstilopredeterminadoCxSpLast align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>UM</span></b></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=96 nowrap style='width:70.85pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpFirst align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>I001</span></p>
  </td>
  <td width=154 style='width:4.0cm;border-top:none;border-left:none;border-bottom:
  solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.15pt'>
  <p class=EstilopredeterminadoCxSpMiddle align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>51021920000</span></p>
  </td>
  <td width=222 style='width:163.05pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpMiddle style='margin-bottom:0cm;margin-bottom:
  .0001pt;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>Pelo
  de Conejo o liebre</span></p>
  </td>
  <td width=74 nowrap style='width:54.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpLast align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=96 nowrap style='width:70.85pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpFirst align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>I002</span></p>
  </td>
  <td width=154 style='width:4.0cm;border-top:none;border-left:none;border-bottom:
  solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.15pt'>
  <p class=EstilopredeterminadoCxSpMiddle align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>32041200000</span></p>
  </td>
  <td width=222 style='width:163.05pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpMiddle style='margin-bottom:0cm;margin-bottom:
  .0001pt;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>Tintes
  de Diferentes Colores</span></p>
  </td>
  <td width=74 nowrap style='width:54.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpLast align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=96 nowrap style='width:70.85pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpFirst align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>I003</span></p>
  </td>
  <td width=154 style='width:4.0cm;border-top:none;border-left:none;border-bottom:
  solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:14.15pt'>
  <p class=EstilopredeterminadoCxSpMiddle align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>13019090100</span></p>
  </td>
  <td width=222 style='width:163.05pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpMiddle style='margin-bottom:0cm;margin-bottom:
  .0001pt;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>Goma
  Laca</span></p>
  </td>
  <td width=74 nowrap style='width:54.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpLast align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=96 nowrap style='width:70.85pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpFirst align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>I004</span></p>
  </td>
  <td width=154 nowrap style='width:4.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpMiddle align=center style='margin-bottom:
  0cm;margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>51011100000</span></p>
  </td>
  <td width=222 nowrap style='width:163.05pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpMiddle style='margin-bottom:0cm;margin-bottom:
  .0001pt;line-height:normal'><span style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>Blouse
  de Lana de Oveja</span></p>
  </td>
  <td width=74 nowrap style='width:54.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=EstilopredeterminadoCxSpLast align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:10.0pt;font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
 </tr>
</table>
<br><br>
<!--ESPACIO DE TRABAJO DETALLE DE PRODUCTOS--->
<p class=MsoListParagraph style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;text-indent:-36.0pt;line-height:normal;border:none'><b><span
style='font-family:"Tahoma","sans-serif"'>V.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></b><b><span style='font-family:"Tahoma","sans-serif"'>PRODUCTOS</span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;border:none'><span style='font-family:"Tahoma","sans-serif"'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=634
 style='width:465.75pt;margin-left:-7.35pt;border-collapse:collapse;border:
 none'>
 <tr style='height:23.75pt'>
  <td width=48 style='width:35.45pt;border:solid windowtext 0.5pt;background:
  #BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  -5.3pt;margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:
  center;line-height:normal'><b><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Código</span></b></p>
  </td>
  <td width=96 style='width:70.85pt;border:solid windowtext 0.5pt;border-left:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Partida Arancelaría</span></b></p>
  </td>
  <td width=231 style='width:170.0pt;border:solid windowtext 0.5pt;border-left:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Descripción</span></b></p>
  </td>
  <td width=39 style='width:1.0cm;border:solid windowtext 0.5pt;border-left:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>UM</span></b></p>
  </td>
  <td width=87 style='width:63.75pt;border:solid windowtext 0.5pt;border-left:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Coeficiente de
  Consumo</span></b></p>
  </td>
  <td width=58 style='width:42.5pt;border:solid windowtext 0.5pt;border-left:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  -5.4pt;margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:
  center;line-height:normal'><b><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>%</span></b></p>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  -5.4pt;margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:
  center;line-height:normal'><b><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Sobrante</span></b></p>
  </td>
  <td width=75 style='width:54.85pt;border:solid windowtext 0.5pt;border-left:
  none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  -7.35pt;margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:
  center;line-height:normal'><b><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>%
  Desperdicio</span></b></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>P001</span></b></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>65010000000</span></b></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Campana
  de Pelo de Conejo de  90 gr.</span></b></p>
  </td>
  <td width=39 style='width:1.0cm;border-top:none;border-left:none;border-bottom:
  solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;background:#D9D9D9;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>PCE</span></b></p>
  </td>
  <td width=87 style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
  <td width=58 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;background:#D9D9D9;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
  <td width=75 style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I001</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>51021920000</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Pelo
  de Conejo o liebre</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>132,35000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>32,00</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I002</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>32041200000</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Tintes
  de Diferentes Colores</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>5,70000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>P002</span></b></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>65010000000</span></b></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Campana
  de Pelo de Conejo de 100 gr.</span></b></p>
  </td>
  <td width=39 style='width:1.0cm;border-top:none;border-left:none;border-bottom:
  solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;background:#D9D9D9;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>PCE</span></b></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I001</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>51021920000</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Pelo
  de Conejo o liebre</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>147,06000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>32,00</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I002</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>32041200000</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Tintes
  de Diferentes Colores</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>6,00000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>P003</span></b></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>65010000000</span></b></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Campana
  de Pelo de Conejo de 110 gr.</span></b></p>
  </td>
  <td width=39 style='width:1.0cm;border-top:none;border-left:none;border-bottom:
  solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;background:#D9D9D9;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>PCE</span></b></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I001</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>51021920000</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Pelo
  de Conejo o liebre</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>161,76000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>32,00</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I002</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>32041200000</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Tintes
  de Diferentes Colores</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>6,60000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>P004</span></b></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><b><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>65010000000</span></b></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Campana
  de Pelo de Conejo de 120 gr.</span></b></p>
  </td>
  <td width=39 style='width:1.0cm;border-top:none;border-left:none;border-bottom:
  solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;background:#D9D9D9;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><b><span style='font-size:
  8.0pt;font-family:"Tahoma","sans-serif"'>PCE</span></b></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'></td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I001</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>51021920000</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Pelo
  de Conejo o liebre</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>176,47000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>32,00</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I002</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>32041200000</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Tintes
  de Diferentes Colores</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>7,20000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
 </tr>
 <tr style='height:14.15pt'>
  <td width=48 nowrap style='width:35.45pt;border:solid windowtext 0.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>I003</span></p>
  </td>
  <td width=96 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>13019090100</span></p>
  </td>
  <td width=231 style='width:170.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>Goma
  Laca</span></p>
  </td>
  <td width=39 nowrap style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>GRM</span></p>
  </td>
  <td width=87 nowrap style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-bottom:0cm;
  margin-bottom:.0001pt;text-align:center;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Tahoma","sans-serif"'>90,00000000</span></p>
  </td>
  <td width=58 nowrap style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
  <td width=75 nowrap style='width:54.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 0.5pt;border-right:solid windowtext 0.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt'>
  <p class=MsoNormalCxSpMiddle align=center style='margin-top:0cm;margin-right:
  0cm;margin-bottom:0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:
  center;text-indent:-18.0pt;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Tahoma","sans-serif"'>0,00</span></p>
  </td>
 </tr>
</table>
<br><br><br><br><br>

<p class=MsoNormal style='text-align:justify'><span lang=ES-MX>En cumplimiento
a lo dispuesto en el Artículo 3 inciso i) del Reglamento del Régimen de
Admisión Temporal para Perfeccionamiento Activo – RITEX (D.S. 3543), el
presente formulario <b>EN TODO SU CONTENIDO TIENE CALIDAD DE DECLARACION
JURADA.</b></span></p>

	<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Tahoma, Helvetica, sans-serif", "normal");
                $pdf->text(500, 780, "$PAGE_NUM", $font, 10);
            ');
        }
	</script>
</body>