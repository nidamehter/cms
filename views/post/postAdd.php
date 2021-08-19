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

								<p ref="gelen" style="display:none"><?php 
																	print_r($post);
																	
																	?>
								</p>

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
	<script src="https://cdn.jsdelivr.net/npm/vue@3.2.4/dist/vue.global.prod.js"></script>
	<script src="node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
	<script src="node_modules/@ckeditor/ckeditor5-vue/dist/ckeditor.js"></script>
	<script src="node_modules/piexifjs/piexif.js"></script>
	<script nomodule src="node_modules/sweetalert2/src/sweetalert2.js"></script>
	<link href="node_modules/bootstrap/dist/css/bootstrap.min.css">


	<!-- VUE3-POST -->
	<script src="postAdd.js"></script>
	<!-- /VUE3-POST -->

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