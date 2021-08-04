<?php require 'views/public/header.php'; ?>


<div class="content">
	<div id="post">
		<!-- Summernote editor -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Post Düzenle</h5>
			</div>

			<div class="card-body">
				<div class="form-group">
					<!-- Multiple row inputs (vertical) -->
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<label>Yazar</label>
									<div class="form-group">
										<input type="text" v-model="post.author" class="form-control">
									</div>
									<label>Kategori</label>
									<div class="form-group">
										<input type="text" v-model="post.categoryname" class="form-control">
									</div>
								</div>

								<div class="col-md-8">
									<label>Başlık</label>
									<div class="form-group">
										<input type="text" v-model="post.title" class="form-control">
									</div>
									<label>Konu</label>
									<div class="form-group">
										<input type="text" v-model="post.message" class="form-control">
									</div>
								</div>
							</div>
							<br> <br>
							<!-- /form inputs -->
							<textarea rows="20"  cols="150" v-model="post.text"></textarea>
							<div class="form-group">
							<br>		
								<!--	<button v-on:click="guncelle()" id="edit" class="btn btn-primary"><i class="icon-pencil3 mr-2"></i> Edit</button> -->
								<button v-on:click="kaydet()" class="btn btn-success"><i class="icon-checkmark3 mr-2"></i> Kaydet </button>
							</div>

						</div>
					</div>
					<!-- /multiple row inputs (vertical) -->
				</div>


			</div>

		</div>
	</div>
</div>
</div>
<!-- /summernote editor -->

<script>
	$('#summernote').summernote({
		tabsize: 2,
		height: 200

	});
</script>
<!-- Vue -->

<?php require 'views/public/footer.php'; ?>
<script>
	var vm = new Vue({
		el: '#post',
		data: {
			post: {
				author: "",
				categoryname: "",
				title: "",
				message: "",
				text: ""
			}

		},
		methods: {

			kaydet: function() {
				let data = {
					post: vm.post
				};
				let url = '/cms/post';
				axios.post(url,
					data, {
						headers: {
							'Content-Type': "application/json"
						}
					}).then(function(response) {

					console.log(response.data);



				}).catch(function(err) {
					console.log(err);
				});

			},
		}
	});
</script>


</div>
<!-- /main content -->

</div>
<!-- /page content -->
</div>
</body>

</html>