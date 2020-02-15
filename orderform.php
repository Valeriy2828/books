<?php

require ("includes/header.php");
?>	

<div class="full_image_11" ><img src="images/nebo_oblaka.jpg" alt="sky">
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="rectangle1">	
					<form action="saveorder.php" method="post">
							<h2 align="center"><font color = #0000CD>Пожалуйста оформите заказ!</font></h2>
							<div class="cust"><p><font color = #0000CD>Заказчик*: <br><input type="text" name="name" 
										size="50"></font></p></div>
							<div class="milo"><p><font color = #0000CD>Email заказчика: <input type="text" name="email"
										size="50"></p></font></div> 
							<div class="tel"><p><font color = #0000CD>Телефон для связи*: <input type="text" name="phone"
											size="50"></p></font></div> 
							<div class="street"><font color = #0000CD><p>Адрес доставки*: <br><textarea name="address" 
														 cols="48" rows="5"></textarea></p></font></div> 
							<div class="ord"><p align="center"><font color = #0000CD><input type="submit" value="Заказать"></p></font></div> 
							<div class="zvezda"><font color = #0000CD><p align="center"><font color = "red">*</font> обязательные поля для заполнения</p></font></div>
						</form>
				</div>
			</div>	
		</div>		
	</div>			
</div>