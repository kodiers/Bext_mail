<?php
global $greeting;
$err_count = 0;

function show_form() 
{	
	//  Function to display form
	
	echo '
	<form method="post" action="">
		<table width="336" height="200" border="0" cellspacing="2" cellpadding="4" align="center">
		<tr>
			<td width="61" align="right" valign="top" bordercolor="#999999"  class="style21">              
				<div align="left" class="style35 style42 style43 style48 style52">
				<div align="right">Имя:</div>
				</div>
			</td>
			<td width="253" colspan="2" align="left" valign="top">
				<input name="sender_name" type="text" size="30" height="15" lang="ru" >            
			</td>
		</tr>
		<tr>
			<td width="61" align="right" valign="top" class="style21">
				<div align="left" class="style43 style48 style56">
				<div align="right"><em>E-mail:</em></div>
				</div>
			</td>
			<td colspan="2" align="left" valign="top">
				<input name="email" type="text" size="30" height="15">            
			</td>
		</tr>
		<tr>
			<td width="61" align="right" valign="top" class="style21">
				<div align="right" class="style43 style42 style48 style52 style54">
				</div>
				<div align="left" class="style55">
				<div align="right">Тема:</div>
				</div>            
			</td>
			<td colspan="2" align="left" valign="top">
				<input name="subject" type="text" value="" size="30" height="15">           
			</td>
		</tr>
		<tr>
			<td width="61" align="right" valign="top" class="style42 style48  style43">
				<div align="right">
					<span class="style56">
						<em>Письмо:</em>
					</span>
				</div>
			</td>
			<td colspan="2" align="left" valign="top">
				<textarea name="text"  rows="5"cols="30"></textarea>            
			</td>
		</tr>
		<tr>
			<td width="61" height="32" align="right">&nbsp; 
			</td>
			<td colspan="2">
				<input type="submit" class="style1" id="go!" value="Отправить" name="submit">
				<hr width="180" align="right">
				<div align="right" class="style49">
					<span class="style51"> Заранее спасибо за ваше обращение!</span>
				</div>
			</td>
		</tr>
	</table>
	</form>';
}

function complete_mail($flag) {
	//
	// Form and send email
	// 
	// 
	// 
	$_POST['sender_name'] =  substr(htmlspecialchars($_POST['sender_name']), 0, 100);
	$_POST['subject'] =  substr(htmlspecialchars($_POST['subject']), 0, 100);
	$_POST['email'] =  substr(htmlspecialchars(trim($_POST['email'])), 0, 100);
	//  Check sender name field
	//if (empty($_POST['sender_name']))
	//{
	//	output_err(0);
	//}
	//else
	//	$greeting = 'Мы с радостью ответим на все ваши вопросы и предложения.';
	// Check email field
	//if(empty($_POST['email']))
	//{
	//	output_err(1);
	//}
	//else
	//	$greeting = 'Мы с радостью ответим на все ваши вопросы и предложения.';
	// Email must be in %a@%a.%a format
	//if(!empty($_POST['email']))
	//{
	//	if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST['email']))
	// 			output_err(2);
	// 		else
	// 			$greeting = 'Мы с радостью ответим на все ваши вопросы и предложения.';
	// 	}
	// 	else
	// 		$greeting = 'Мы с радостью ответим на все ваши вопросы и предложения.';
	// Form message
	$mess = '<html>
				<head>
  					<title>Письмо с сайта Бекст</title>
				</head>
				<body>
  					Пользователь: '.$_POST['sender_name'].' написал: '.'
						'.$_POST['text'].'
						'.$_POST['email'].'
				</body>
			</html>';
	$subject = 'Сообщение с сайта Бекст: '.$_POST['subject'];
	// $to - email to wich mail should send
	$to = 'kodiers@gmail.com';
	// $from - from whom email will be send
	$from='admin@vmk0.ru';
	$headers = "Content-type: text/html; charset=windows-1251 \r\n";
	$headers .= "From: Письмо с сайта Бекст <$from>\r\n";
	if($flag == 0)
	{
		mail($to, $subject, $mess, $headers);
		echo 'Ваше сообщение было отправлено. Мы с вами свяжемся в ближайшее время.';
	}
	else
	{
		exit();
	}
}

function output_err($num)
{
	// Simple check errors
	$err[0] = '<p class="style41 "><em>Ошибка! Не заполнено поле "Имя".</span></em></p>';
	$err[1] = '<p class="style41 "><em>Ошибка! Не заполнено поле "e-mail".</span></em></p>';
	$err[2] = '<p class="style41 "><em>Ошибка! Поле "e-mail" заполнено не правильно.</span></em></p>';
	//$greeting = $err[num];
	//var_dump($greeting);
	//echo $err[$num];
	//show_form();
	//exit();
	return $err[num];
}



echo '<html>
<head>
<title>Компания Бекст, юридические услуги, юридическая консультация, адвокат</title>
<link rel="stylesheet" href="css/general.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta name="Keywords" content="юридические услуги, юридическая консультация, адвокат, аутсорсинг юридических услуг, компания Бекст, ООО «Бекст»">
<meta name="description" content="Юридические услуги. Бизнес адвокат. Аутсорсинг организаций. Компания Бекст">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Бекст 2012 -->
<table id="Table_01" width="1200" height="1501" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td rowspan="2" background="images/images_01.jpg" width="125" height="84"></td>
		<td colspan="4" rowspan="2"><a href="index.html"><img src="images/images_02.jpg" width="269" height="84" border="0"></a></td>
		<td colspan="15" background="images/images_03.jpg" width="666" height="22"></td>
		<td rowspan="2" background="images/images_04.jpg" width="140" height="84"></td>
	</tr>
	<tr>
		<td width="193" height="62" colspan="5" align="center" valign="middle" background="images/images_05.jpg" style="font-size:18px"><h4><strong>8 (985) 643 03 22</strong></h4></td>
		<td>
    <a href="index.html" onMouseOver="document.linc1.src=\'images/images_act_06.jpg\';" onMouseOut="document.linc1.src=\'images/images_06.jpg\';"><img src="images/images_06.jpg" name="linc1" width="126" height="62" border="0"></a></td>
		<td colspan="3"><a href="price.html" onMouseOver="document.linc2.src=\'images/images_act_07.jpg\';" onMouseOut="document.linc2.src=\'images/images_07.jpg\';"><img src="images/images_07.jpg" name="linc2" width="124" height="62" border="0"></a></td>
		<td colspan="4">
			<a href="contacts.html" onMouseOver="document.linc3.src=\'images/images_act_08.jpg\';" onMouseOut="document.linc3.src=\'images/images_08.jpg\';"><img src="images/images_08.jpg" name="linc3" width="98" height="62" border="0"></a></td>
		<td colspan="2">
			<a href="feedback.html" onMouseOver="document.linc4.src=\'images/images_act_09.jpg\';" onMouseOut="document.linc4.src=\'images/images_act_09.jpg\';"><img src="images/images_act_09.jpg" name="linc4" width="125" height="62" border="0"></a></td>
	</tr>
	<tr>
		<td colspan="21" background="images/images_10.jpg" width="1200" height="48"></td>
	</tr>
	<tr>
		<td background="images/images_11.jpg" width="125" height="299"></td>
		<td colspan="7" background="images/images_12.jpg" width="354" height="299"></td>
		<td colspan="12"><img src="images/images_13.gif" width="581" height="299" alt=""></td>
		<td background="images/images_14.jpg" width="140" height="299"></td>
	</tr>
	<tr>
		<td colspan="21" background="images/images_15.jpg" width="1200" height="53"></td>
	</tr>
	<tr>
		<td width="125" height="33"></td>
		<td colspan="19">
			<img src="images/images_17.jpg" width="935" height="33" alt=""></td>
		<td width="140" height="33"></td>
	</tr>
	<tr>
		<td width="125" height="82"></td>
		<td colspan="2" background="images/images_20.jpg" width="120" height="82"></td>
		<td colspan="17" width="815" height="82"><h1>Отправка сообщения ООО &quot;Бекст&quot;</h1></td>
		<td width="140" height="82"></td>
	</tr>
	<tr>
		<td width="125" height="237"></td>
		<td width="935" height="237" colspan="19" align="left" valign="top"><p>&nbsp;</p>
	    <p>Если Вам удобнее общаться с нами по электронной почте, Вы всегда можете это сделать прямо с данной страницы. </p>
	    <p>Если Вам нужна краткая юридическая консультация или Вы хотите, чтобы закрепленный за Вами юрист или адвокат связались с вами, укажитев поле его имя, и вкраце опишите Вашу задачу. </p>
	    <p>- Компания Бекст понимает Вашу потребность в немедленном реагировании на проблему и готова сделать для этого все необходимое!</p>
	    <p>&nbsp;</p>
	    <p>Если вы уже являетесь нашим клиентом, просьба указать номер договора.</p>
	    <p>&nbsp;</p>
	    <p>Если Вы желаете получить общую информацию о конкретной услуге, просьба указать что именно Вас интересует: аутсорсинг, юридическая консультация или представление интересов в суде. </p>
	    <p>&nbsp;</p>
	    <p>Наши специалисты свяжутся с Вами в ближайшее время!</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>Также, Вы всегда сможете написать нам и со своей электронной почты,</p>
	    <p>Наши адреса:        </p>
	    <p align="justify"><strong>bekst@bekst.com</strong></p>
        <p align="justify"><strong>secretar@bekst.com</strong></p>
        <p align="justify">&nbsp; </p>
<p>&nbsp;</p>
<table width="487" border="0" align="center">


  <tr>

    <td align="center" valign="top">
<strong>Отправка сообщения</strong>     
<hr align="center" width="280">
		<!-- do phrase as variable -->';
		if (empty($_POST['submit']))
		{
    		$greeting = 'Мы с радостью ответим на все ваши вопросы и предложения.';
		}
		if (!empty($_POST['submit']))
		{
			if (empty($_POST['sender_name']))
			{
				$greeting = 'Ошибка! Не заполнено поле "Имя".';
				//var_dump($greeting);
				//var_dump(output_err(0));
				$err_count = 1;
			}
			// Check email field
			if(empty($_POST['email']))
			{
				$greeting = 'Ошибка! Не заполнено поле "e-mail".';
				$err_count = 1;
			}
			// Email must be in %a@%a.%a format
			if(!empty($_POST['email']))
			{
				if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST['email']))
				{
					$greeting = 'Ошибка! Поле "e-mail" заполнено не правильно.';
					$err_count = 1;
				}
			}
		}
			
echo '<p align="center"><em>'.$greeting.'</em></p>      
</tr>

  <tr>
    <td  width="481"  valign="top"><!-- Email form -->'; 
    	// show form or send email
    	if (!empty($_POST['submit']))
    		if ($err_count == 1)
    		{
    			show_form();
    			//complete_mail($err_count);
    		}
    		else
    			complete_mail(0);
    	else
    		show_form();
    	
    	echo '<!-- End email form --></td>

  </tr>
<tr>
    <td  width="481"  valign="top">      
       </td>

  </tr>
</table>
	    </p></td>
		<td width="140" height="237"></td>
	</tr>
	<tr>
		<td width="125" height="31"></td>
		<td colspan="19">
			<img src="images/images_27.jpg" width="935" height="31" alt=""></td>
		<td>
			<img src="images/images_28.jpg" width="140" height="31" alt=""></td>
	</tr>
	<tr>
		<td width="125" height="32"></td>
		<td colspan="19" width="935" height="32" align="center"></td>
		<td width="140" height="32"></td>
	</tr>
	<tr>
		<td rowspan="3" width="125" height="383"></td>
		<td rowspan="3" width="32" height="383"></td>
		<td colspan="2" background="images/images_34.jpg" width="96" height="113"></td>
		<td colspan="2" background="images/images_35.jpg" width="163" height="113"></td>
		<td rowspan="3" width="41" height="383"></td>
		<td colspan="2" background="images/images_37.jpg" width="96" height="113"></td>
		<td colspan="3" background="images/images_38.jpg" width="165" height="113"></td>
		<td rowspan="3" width="39" height="383"></td>
		<td colspan="2" background="images/images_40.jpg" width="96" height="113"></td>
		<td colspan="4" background="images/images_41.jpg" width="164" height="113"></td>
		<td rowspan="3" width="43" height="383"></td>
		<td rowspan="3" width="140" height="383"></td>
	</tr>
	<tr>
		<td width="259" height="240" colspan="4" align="left" valign="top" style="font-style:oblique;"><strong>Правовая экспертиза договоров</strong> &ndash; 15 в мес.
		  <p align="left"><br>
	      <strong>Консультация</strong> &ndash; 15 в мес.</p>
		  <p align="left"><br>
	      <strong>Разработка внутренних актов компании</strong> &ndash; 10 в мес.</p>
		  <p align="left"><br>
	      <strong>Подготовка документов к участию в суде</strong> &ndash; 3 в Мес.</p>
		  <p align="left"><br>
	      <strong>Представление интересов в судебном процессе</strong> &ndash; 2 в мес.</p>
		  <p align="left"><br>
          <strong>Присутствие юриста на переговорах клиента</strong> &ndash; 1 в мес</p>
		  <p align="left">&nbsp;</p>
		  <p align="left"><strong>Скидки на ВСЕ остальные услуги компании!</strong></p>
		  <p align="left">&nbsp;</p>
		  <p align="left"><strong>Возможность заказа срочного исполнения услуг!</strong></p>
		  <br>
		  Стоимость: 60 000 руб./мес.
          </p>
      <p>&nbsp; </p></td>
		<td width="261" height="240" colspan="5" align="left" valign="top" style="font-style:oblique;"><strong>Правовая экспертиза договоров</strong> &ndash; 5 в мес.
          <p align="left"><br>
            <strong>Консультация</strong> &ndash; 10 в мес.</p>
          <p align="left"><br>
            <strong>Разработка внутренних актов компании</strong> &ndash; 10 в мес.</p>
          <p align="left"><br>
            <strong>Подготовка документов к участию в суде</strong> &ndash; 2 в Мес.</p>
          <p align="left">&nbsp;</p>
          <p align="left"><strong>Скидки на ВСЕ остальные услуги компании!</strong></p>
          <p align="left">&nbsp;</p>
          <p align="left"><strong>Возможность заказа срочного исполнения услуг!</strong></p>
          <p><br>
            Стоимость: 40 000 руб./мес.</br>
          </p>
        <p></p></td>
		<td width="260" height="240" colspan="6" align="left" valign="top" style="font-style:oblique;"><strong>Правовая экспертиза договоров</strong> &ndash; 2 в мес.
          <p align="left"><br>
            <strong>Консультация</strong> &ndash; 5 в мес.</p>
          <p align="left"><br>
            <strong>Разработка внутренних актов компании</strong> &ndash; 2 в мес.</p>
          <p align="left">&nbsp;</p>
          <p align="left"><strong>Скидки на ВСЕ остальные услуги компании!</strong></p>
          <p align="left">&nbsp;</p>
          <p align="left"><strong>Возможность заказа срочного исполнения услуг!</strong><br>
            <br>
            Стоимость: 15 000 руб./мес.</br>
          </p>
<p></p></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="gold.html" onMouseOver="document.linc5.src=\'images/images_act_47.jpg\';" onMouseOut="document.linc5.src=\'images/images_47.jpg\';"><img src="images/images_47.jpg" name="linc5" width="96" height="30" border="0"></a></td>
		<td colspan="2" width="163" height="30"></td>
		<td colspan="2">
			<a href="silver.html" onMouseOver="document.linc6.src=\'images/images_act_49.jpg\';" onMouseOut="document.linc6.src=\'images/images_49.jpg\';"><img src="images/images_49.jpg" name="linc6" width="96" height="30" border="0"></a></td>
		<td colspan="3" width="165" height="30"></td>
		<td colspan="3">
			<a href="start.html" onMouseOver="document.linc7.src=\'images/images_act_51.jpg\';" onMouseOut="document.linc7.src=\'images/images_51.jpg\';"><img src="images/images_51.jpg" name="linc7" width="99" height="30" border="0"></a></td>
		<td colspan="3" width="161" height="30"></td>
	</tr>
	<tr>
		<td width="125" height="12"></td>
		<td colspan="19" width="935" height="12"></td>
		<td width="140" height="12"></td>
	</tr>
	<tr>
		<td width="125" height="44"></td>
		<td colspan="19">
			<img src="images/images_57.jpg" width="935" height="44" alt=""></td>
		<td width="140" height="44"></td>
	</tr>
	<tr>
		<td width="125" height="80"></td>
		<td colspan="19" width="935" height="80"></td>
		<td width="140" height="80"></td>
	</tr>
	<tr>
		<td background="images/images_62.jpg" width="125" height="82"></td>
		<td colspan="16" background="images/images_63.jpg" width="739" height="82"><a href="index.html"> О компании</a> | <a href="prise.html">Услуги и цены</a> | <a href="contacts.html">Контакты</a> | <a href="feedback.html">Обратная связь</a></td>
		<td colspan="3" background="images/images_64.jpg" width="196" height="82"><a href="index.html">ООО "Бекст" 2012</a></td>
		<td background="images/images_65.jpg" width="140" height="82"></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="125" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="32" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="88" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="141" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="22" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="41" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="22" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="74" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="34" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="126" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="39" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="80" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="16" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="71" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="82" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="43" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="140" height="1" alt=""></td>
	</tr>
</table>
<!-- Сделано в 2012 году -->
</body>
</html>';

?>