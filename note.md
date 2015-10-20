p_type
==============
1 = file
2 = pengumuman
3 = komen

pesan berdasarkan id_dosen ( TID = id_dosen, p_type = 2 )
|-	pengumuman ke seluruh mahasiswa bimbingan berdasarkan dosen tertentu
|-	TID = 0, juga dimasukkan untuk pengumuman dari admin

pesan berdasarkan id_mhs ( TID = id_mhs, p_type = 3 )
|-	preivate message ke mahasiswa tertentu

pesan berdasarkan pid ( TID = pid asistensi, p_type = 4 )
|-	komentar asistensi

u_name
relasi
uid
u_nicename
u_level
login
pass_tmp

#######################################
				ASISTENSI
#######################################

- setiap laporan memiliki item asistensi
- setiap asistensi memiliki komentar
- setiap asistensi memiliki status
- asistensi dan laporan disorting berdasarkan id mahasiswa
- komentar disorting berdasarkan PID asistensi

p_type 1
=======================================
# item laporan
- id_1
- file_name
- file_name_enc
- file_date

p_type 5
=======================================
# item asistensi
- id_5
- tid = pid laporan
- nama_item
- keterangan
