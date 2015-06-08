# Tugas Akhir agusDiyansyah <br>
sesuaikan base_url pada file config.php <br>
path : /application/config/config.php
```
$config['base_url'] = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '').'://'.$_SERVER['HTTP_HOST'] . '/kuliah/ajax/';
```
ganti /kuliah/ajax/ sesuai dengan path project <br>
misal : <br>
(path saya : htdocs/kuliah/ajax/)
