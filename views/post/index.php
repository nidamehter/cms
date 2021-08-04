<?php require 'views/public/header.php'; ?>

<div class="content">
	<div>
		<!-- Summernote editor -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Post Düzenle</h5>
			</div>

			<div class="card-body">
				<div class="form-group">

					<!-- Multiple row inputs (vertical) -->
					<div class="card">
						<div id="post" class="card-body">

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

								<div class="col-md-4">

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

							<br /><br />
							<!-- /form inputs -->

							<div class="row">
								<div class="col-md-8">
									<!-- <div id="editor">This is some sample content.</div> -->

									<div>
										<ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
									</div>

									<br>
									<button v-on:click="kaydet()" class="btn btn-success"><i class="icon-checkmark3 mr-2"></i> Save</button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php require 'views/public/footer.php'; ?>
	<script src="node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
	<script src="node_modules/@ckeditor/ckeditor5-vue2/dist/ckeditor.js"></script>
	
	<script>
		Vue.use(CKEditor);

		const vm = new Vue({
			el: '#post',
			data: {
				editor: ClassicEditor,
				editorData: '<p>Content of the editor.</p>',
				editorConfig: {
					// The configuration of the editor.
				},
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
					this.post.text = this.editorData
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
</div>
<!-- /page content -->

</body>

</html>