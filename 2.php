<?php
	function cetakdata($kodevoucher , $bayar, $totalbelanja)
	{
		if ($kodevoucher == 'DumbWaysJos' && $totalbelanja >= 50000) 
		{
			$diskon = 21.1 / 100;
			$potongan = $totalbelanja * $diskon;
			if ($potongan >= 20000)
			{
				$potongan = 20000;
				$totalbayar = $bayar - $potongan;
				$Kembalian = $bayar - $totalbayar;
			}
			else
			{
				$totalbayar = $bayar - $potongan;
				$Kembalian = $bayar - $totalbayar;
			}
			echo 'Total Belanja : '.$totalbelanja;
			echo '<br>Kode Voucher : '.$kodevoucher;
			echo '<br>Diskon : '.$diskon;
			echo '<br>Total Bayar : '.$totalbayar;
			echo '<br>Tunai : '.$bayar;
			echo '<br>Kembalian : '.$Kembalian;
		}
		else if ($kodevoucher == 'DumbWaysMantap' && $totalbelanja >= 80000)
		{
			$diskon = 30 / 100;
			$potongan = $totalbelanja * $diskon;
			if ($potongan >= 40000)
			{
				$potongan = 40000;
				$totalbayar = $bayar - $potongan;
				$Kembalian = $bayar - $totalbayar;
			}
			else
			{
				$totalbayar = $bayar - $potongan;
				$Kembalian = $bayar - $totalbayar;
			}
			echo 'Total Belanja : '.$totalbelanja;
			echo '<br>Kode Voucher : '.$kodevoucher;
			echo '<br>Diskon : '.$diskon;
			echo '<br>Total Bayar : '.$totalbayar;
			echo '<br>Tunai : '.$bayar;
			echo '<br>Kembalian : '.$Kembalian;
		}
		else
		{
			echo 'Kode Voucher Tidak Ditemukan';
		}
	}

	cetakdata('DumbWaysJos', 100000, 100000);
?>