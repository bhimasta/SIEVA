<div class="panel colored" id="box-form-jadwal">
	<div class="panel-heading green-bg">
		<h3 class="panel-title">Penjadwalan</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-3"><h4>Mulai</h4></div>
			<div class="col-md-3"><h4>Akhir</h4></div>
		</div>

		<?php foreach ($list_prodi as $key => $prodi) { ?>
		<div class="row">
			<form role="form" id="form-jadwal-<?= $key+1 ?>">
				<input type="hidden" value="<?= $kode ?>" name="id_paket" class="id_paket">
				<input type="hidden" value="<?= $prodi['id_unit'] ?>" name="id_unit" class="id_unit">
				<div class="col-md-6">
					<label><?php echo $prodi['unit'] ?></label>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control tgl_mulai" name="tgl_mulai" id="paket-datepicker-start-<?=$key+1?>">
							<span class="input-group-addon  accordion-toggle">
								<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control tgl_akhir" name="tgl_akhir" id="paket-datepicker-end-<?=$key+1?>">
							<span class="input-group-addon  accordion-toggle">
								<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
							</span>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php } ?>
	</div>
	<div class="panel-footer">
		<a href="javascript:void(0)" class="blue-bg btn" id="save-jadwal">Simpan</a>
		<div id="save-jadwal-loading">
			<img src="/public/assets/images/spinner.gif" alt="Menyimpan..." title="Menyimpan..." />Menyimpan...
		</div>
	</div>
</div>

<input type="hidden" value="<?= count($list_prodi) ?>" id="jumlah_prodi">


	<?php for ($i=1; $i <= count($list_prodi) ; $i++) { 
		echo '<script type="text/javascript">';
		echo "$('#paket-datepicker-start-".$i."').datetimepicker({
		   		lang:'de',
				 i18n:{
				  de:{
				   months:['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
				   dayOfWeek:['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
				  }
				 },
				 timepicker:false,
				 format:'d/m/Y',
				 minDate:Date(),
				 onShow:function( ct ){
				 	maxDate 	= $('#paket-datepicker-end-".$i."').val();
				 	arrMaxDate 	= maxDate.split('/');
				 	newMaxDate 	= arrMaxDate[2]+'/'+arrMaxDate[1]+'/'+arrMaxDate[0];
				   	this.setOptions({
				   		maxDate:$('#paket-datepicker-end-".$i."').val()?newMaxDate:false
				   	});
				 }
		   });
		   $('#paket-datepicker-end-".$i."').datetimepicker({
		   		lang:'de',
				 i18n:{
				  de:{
				   months:['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
				   dayOfWeek:['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
				  }
				 },
				 timepicker:false,
				 format:'d/m/Y',
				 onShow:function( ct ){
				 	minDate 	= $('#paket-datepicker-start-".$i."').val();
				 	arrMinDate 	= minDate.split('/');
				 	newMinDate 	= arrMinDate[2]+'/'+arrMinDate[1]+'/'+arrMinDate[0];
				   	this.setOptions({
				   		minDate:$('#paket-datepicker-start-".$i."').val()?newMinDate:false
				   	})
				 }
		   });
		
		";

	 
	echo '</script>';
	} ?>
	