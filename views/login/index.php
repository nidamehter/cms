<?php require 'header.php'; ?>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Admin Panel</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">

						<div id="form" class="signin-form">
							<div class="form-group">
								<input type="text" class="form-control" v-model="Vmail" name="email" placeholder="Kullanıcı Email" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" v-model="Vpass" class="form-control" name="password" placeholder="Parola" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" v-on:click="check_userAddForm" value="submit" name="submit" class="form-control btn btn-primary submit px-3">Giriş Yap</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary"> Beni Hatırla
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>

								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Şifreni mi unuttun ?</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://cdn.jsdelivr.net/npm/vue@3.0.2/dist/vue.global.js"></script>
	<script>
		const formApp = Vue.createApp({
			//Data
			data() {
				return {
					Vmail: null,
					Vpass: null,
				}
			},
			methods: {
				async check_userAddForm() {
					let login = {
						mail: this.Vmail,
						pass: this.Vpass,
					}
					let url = '/cms/admin/giris';
					await axios.post(url, login, {
						headers: { //application/x-www-form-urlencoded
							'Content-Type': "application/json"
						}
					}).then((response) => {
						//this.responseData = response.data;
						console.log(response.data);

						if (response.data != null && response.data.success == true) {
							if (response.data.result < 1) {
								Swal.fire('Giriş Başarısız!', 'Tekrar Deneyin!', 'error')
							} else {
								Swal.fire('Hoşgeldiniz !', 'Giriş Başarılı !', 'success')

								setTimeout(function() {
									window.location.href = "/cms/admin"
								}, 3000);
							}
						}

					}).catch(function(err) {
						console.log(err);
					});
				}
			},
			//Properties
			computed: {}
		});

		//Mount
		const form = formApp.mount('#form')
	</script>

	<?php require 'footer.php'; ?>

</body>

</html>