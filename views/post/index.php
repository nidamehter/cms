<?php require 'views/public/header.php';

?>

<!-- content-wrapper -->
<div class="content-wrapper">

	<!-- content -->
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
								<p ref="gelen" style="display:none"> <?php isset($post) ? print_r($post) : null ?></p>
								<div class="row">
									<div class="col-md-4">
										<label>Yazar</label>
										<div class="form-group">
											<input placeholder="Ör: CodeTalker" type="text" v-model="post.author" class="form-control">
										</div>

										<label>Kategori</label>
										<div>
											<select required="" class="form-control" id="exampleFormControlSelect1" v-model="post.categoryid">
												<option disabled value="">Lütfen Bir Kategori Seçiniz</option>
												<?php foreach ($categories as $category => $value) : ?>
													<option value=<?= $value["id"] ?>> <?= $value["name"] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>

									<div class="col-md-4">
										<label>Başlık</label>
										<div class="form-group">
											<input placeholder="Ör: Yazılım" type="text" v-model="post.title" class="form-control">
										</div>

										<label>Konu</label>
										<div class="form-group">
											<input type="text" v-model="post.message" class="form-control">
										</div>
									</div>
								</div>

								<br />

								<div class="form-group row">
									<div class="col-lg-8" v-cloak @drop.prevent="selectImageDrag" @dragover.prevent>
										<input type="file" class="file-input" data-fouc @change="selectImage">
										<span class="form-text text-muted"></span>
									</div>
								</div>

								<div class="row">
									<div class="col-md-8">
										<ckeditor class="ck-editor__editable" :editor="editor" v-model="editorData" :config="editorConfig" @ready="onEditorReady"></ckeditor>
										<br>

										<div v-if="post.id">
											<button id="block-page" v-on:click="edit()" class="btn btn-success"><i class="icon-checkmark3 mr-2"></i> Düzenle </button>
										</div>

										<div v-else>
											<button id="block-page" v-on:click="kaydet()" class="btn btn-success"><i class="icon-checkmark3 mr-2"></i> Kaydet </button>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /content -->

	<?php require 'views/public/footer.php'; ?>

	<script src="node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
	<script src="node_modules/@ckeditor/ckeditor5-vue2/dist/ckeditor.js"></script>
	<script nomodule src="node_modules/@ckeditor/ckeditor5-essentials/src/essentials.js"></script>
	<script src="node_modules/piexifjs/piexif.js"></script>
	<script nomodule src="node_modules/sweetalert2/src/sweetalert2.js"></script>
	<link href="node_modules/bootstrap/dist/css/bootstrap.min.css">


	<!-- VUE2-POST -->
	<script>
		Vue.use(CKEditor, Sweetalert2);

		const vm = new Vue({
			el: '#post',
			data: {
				editor: ClassicEditor,
				editorData: '<p></p>',
				editorConfig: {
					// The configuration of the editor.
					placeholder: 'Lütfen içerik giriniz'
				},
				post: {
					id: null,
					author: "",
					categoryid: "",
					title: "",
					message: "",
					text: "",
					uploadImage: ""
				},
				temp: null,
				image: null,
				existPost: null
			},

			methods: {
				onEditorReady() {
					this.editorData = this.temp
				},

				selectImage(event) {
					this.image = event.target.files[0];
					this.post.uploadImage = this.image.name;
				},

				selectImageDrag(event) {
					this.image = event.dataTransfer.files[0];
					this.post.uploadImage = this.image.name;
				},

				async kaydet() {
					if (this.image == "" && this.post.title == "") {
						Swal.fire('Lütfen En Az Resim ve Başlık Bilgisi Ekleyiniz!', 'Eksiklik Var!', 'warning');

					} else {
						this.post.text = this.editorData;

						const formImageData = new FormData();
						formImageData.append('image', this.image, this.image.name);
						formImageData.append('data', JSON.stringify(this.post));


						let url = '/cms/admin/postekle';


						await axios.post(url,
							formImageData, {
								headers: {
									'Content-Type': 'multipart/form-data'
								}
							}).then((result) => {

							console.log(result);
							switch (result.data.success) {
								case 1:
									Swal.fire('Post Başarıyla Eklendi!', 'Başarılı!', 'success');
									break;
								case 2:
									Swal.fire('Post Resimsiz Eklendi!', 'Resmi Gözden Geçiriniz!', 'warning');
									break;
								case 3:
									Swal.fire('Post Eklenemedi!', 'Tekrar Deneyin!', 'error');
									break;
								default:
									Swal.fire('Bilinmeyen Bir Hata!', '???', 'warning');
							}

							setTimeout(function() {
								window.location.href = "/cms/admin/postList"
							}, 2500);

						}).catch(e => {
							console.log(e);
						});

					}
				},

				async edit() {

					this.post.text = this.editorData;

					var submitData = [{

						id: this.post.id,
						author: this.post.author,
						categoryid: this.post.categoryid,
						title: this.post.title,
						message: this.post.message,
						text: this.post.text,

					}]


					const formImageData = new FormData();

					if (this.image != null) {

						submitData.push({
							uploadImage: this.post.uploadImage
						});
						formImageData.append('image', this.image, this.image.name);
					}



					formImageData.append('data', JSON.stringify(submitData));


					let url = '/cms/admin/postEdit';

					await axios.post(url,
						formImageData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then((result) => {
						console.log(result.data)
						switch (result.data.success) {
							case 1:
								Swal.fire(result.data.message, 'Başarılı!', 'success');
								break;
							case 2:
								Swal.fire(result.data.message, 'Resmi Gözden Geçiriniz!', 'warning');
								break;
							case 3:
								Swal.fire(result.data.message, 'Tekrar Deneyin!', 'error');
								break;
							default:
								Swal.fire('Bilinmeyen Bir Hata!', '???', 'warning');
						}



					}).catch(e => {
						console.log(e);
					});


				}


			},

			created() {},
			mounted() {
				this.existPost = this.$refs.gelen.innerText;
				if (this.existPost != null) {

					var temp = JSON.parse(this.existPost);

					var {
						id,
						title,
						message,
						categoryid,
						author,
						text,

					} = temp[0];
					console.log(temp[0]);
					this.post.id = id
					this.post.author = author
					this.post.categoryid = categoryid
					this.post.title = title
					this.post.message = message
					this.temp = text


				}
			}
		});
	</script>
	<!-- /VUE2-POST -->

	<!-- JQUERY -->
	<script src="wait.js"></script>
	<!-- /JQUERY -->

</div>

</div>
<!-- /content-wrapper -->

</div>
<!-- /page content -->

</body>

</html>