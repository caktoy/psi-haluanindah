<?php
echo heading($judul, 3);

echo "<p>";
echo "Halaman ini adalah halaman untuk mengatur akses terhadap <strong>Halaman <i>Front-Office</i></strong>.";
echo br();
echo "Anda dapat mengubah <i>User name</i> dan <i>Password</i> untuk masuk halaman ini.";
echo "</p>";
echo "<hr>";

//attribut dan action untuk form
$attrib_form = array('class' => 'form-horizontal');
echo form_open(base_url().'index.php/admin/update', $attrib_form);;
//komponen form
//hidden
echo form_hidden('txtAdminId', $admin_id);
//textbox admin name
echo "<div class='control-group'>";
$attrib_label = array('class' => 'control-label');
echo form_label('Nama Admin', 'inputAdminName', $attrib_label);;
echo "<div class='controls'>";
$attrib_name = array(
	'name' 			=> 'txtAdminName',
	'type' 			=> 'text',
	'value'			=> $admin_name,
	'placeholder'	=> 'Nama Admin',
	'id'			=> 'inputAdminName'
	);
echo form_input($attrib_name);
echo "</div>";
echo "</div>";
//textbox admin password
echo "<div class='control-group'>";
echo form_label('Password Admin', 'inputAdminPassword', $attrib_label);;
echo "<div class='controls'>";
$attrib_password = array(
	'name' 			=> 'txtAdminPassword',
	'type' 			=> 'password',
	'value'			=> $admin_password,
	'placeholder'	=> 'Password',
	'id'			=> 'inputAdminPassword'
	);
echo form_input($attrib_password);
echo "</div>";
echo "</div>";
//tombol submit
echo "<div class='control-group'>";
echo "<div class='controls'>";
$attrib_button_submit = array('type' => 'submit', 'class' => 'btn btn-primary', 'content' => 'Simpan');
echo form_button($attrib_button_submit);
echo "</div>";
echo "</div>";
//tutup form
echo form_close();
?>