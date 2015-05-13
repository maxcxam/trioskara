
<nav>
	<ul>
		<li id="login">
			<a id="login-trigger" href="#">
				Редактировать поздравление<span>&#x25BC;</span>
			</a>
			<div id="login-content">
                            <form action="index.php" method="post">
					<fieldset id="inputs">
						<input id="username" type="text" name="congr" placeholder="Введите тут новое поздравление" required>   
					</fieldset>
					<fieldset id="actions">
						<input type="submit" id="submit" value="Изменить">
						
					</fieldset>
				</form>
			</div>                     
		</li>
	</ul>
	<ul>
		<li id="add">
			<a id="add-trigger" href="#">
				Добавить пользователя<span>&#x25BC;</span>
			</a>
			<div id="add-content">
                            <form action="index.php?action=add" method="post">
					<fieldset id="inputs">
						<input id="add" type="text" name="name" placeholder="Введите имя" required>
            <input id="add" type="text" name="phone" placeholder="номер телефона начинать с +38" required>
            <input id="add" type="text" name="nameincard" placeholder="Фамилия Имя" required>
            <input id="add" type="text" name="dob" placeholder="день рождения в формате день/месяц(30/12)" required>
            <input id="add" type="text" name="prim" placeholder="Примечание" required>
            <select name="sex" id="add">
              <option value="ж">Женщина</option>
              <option value="м">Мужчина</option>
            </select>   
					</fieldset>
					<fieldset id="actions">
						<input type="submit" id="submit" value="Изменить">
						
					</fieldset>
				</form>
			</div>                     
		</li>
	</ul>
	<ul>
		<li id="search">
			<a id="search-trigger" href="#">
				Поиск и редактирование пользователей<span>&#x25BC;</span>
			</a>
			<div id="search-content">
        <form action="index.php?action=search" method="post">
					<fieldset id="inputs">
						Ищем
              <select name="searchWhere">
              <option value="firstname">По имени</option>
              <option value="phone">по телефону</option>
              <option value="nameincard">По дню рождения</option>
              </select>
            <input id="search" type="text" name="searchWhat" placeholder="Что ищем" required>   
					</fieldset>
					<fieldset id="search">
						<input type="submit" id="submit" value="Искать">
						
					</fieldset>
				</form>
			</div>                     
		</li>
	</ul>
</nav>
<!--</header>-->