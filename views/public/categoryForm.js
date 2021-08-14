//VUE-3
const categoryFormApp = Vue.createApp({
    data() {
        return {
            post: {
                VcategoryName: "",
                VcategoryUrl: "",
                VcategoryDescription: "",
                VcategoryActive: "",
                uploadImage: ""
            },
            image: "",
        }
    },
    methods: {

		selectImage(event) {
			this.image = event.target.files[0];
			this.post.uploadImage = this.image.name;
		},

		selectImageDrag(event) {
			this.image = event.dataTransfer.files[0];
			this.post.uploadImage = this.image.name;
		},

        async kaydet() {
            if (this.image == "" && this.post.VcategoryName == "") {
                Swal.fire('Lütfen En Az Resim ve Kategori Adı Bilgisi Ekleyiniz!', 'Eksiklik Var!', 'warning');

            } else {
                this.post.text = this.editorData;
                
                const formImageData = new FormData();
                formImageData.append('image', this.image, this.image.name);
                formImageData.append('data', JSON.stringify(this.post));

                let url = '/cms/admin/categoryAdd';

                await axios.post(url,
                    formImageData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then((result) => {

                    console.log(result);
                    switch (result.data.success) {
                        case 1:
                            Swal.fire('Kategori Başarıyla Eklendi!', 'Başarılı!', 'success');
                            break;
                        case 2:
                            Swal.fire('Kategori Verileri Resimsiz!', 'Resmi Gözden Geçiriniz!', 'warning');
                            break;
                        case 3:
                            Swal.fire('Kategori Eklenemedi!', 'Tekrar Deneyin!', 'error');
                            break;
                        default:
                            Swal.fire('Bilinmeyen Bir Hata!','???','warning');
                    }
/*
                    setTimeout(function() {
                        window.location.href = "/cms/admin/categoryList"
                    }, 2500);
*/
                }).catch(e => {
                    console.log(e);
                });

            }
        },

    },
    computed: {}
});

//Mount
const userApp = categoryFormApp.mount('#categoryAddForm');