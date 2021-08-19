

const userPostApp = Vue.createApp({
    data(){
        return{
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
        }
    },

    methods: {
        onEditorReady() {
            if(this.temp !=null){
                 this.editorData = this.temp
            } 
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
/*
                    setTimeout(function() {
                        window.location.href = "/cms/admin/postList"
                    }, 2500);*/

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
        
        this.existPost = this.$refs.gelen.innerHTML;
       
        
            if (this.existPost != null) {

                var temp = JSON.parse(this.existPost);
                

                var htmlEntities = {
                    nbsp: ' ',
                    cent: '¢',
                    pound: '£',
                    yen: '¥',
                    euro: '€',
                    copy: '©',
                    reg: '®',
                    lt: '<',
                    gt: '>',
                    quot: '"',
                    amp: '&',
                    apos: '\''
                };
                
                function unescapeHTML(str) {
                    return str.replace(/\&([^;]+);/g, function (entity, entityCode) {
                        var match;
                
                        if (entityCode in htmlEntities) {
                            return htmlEntities[entityCode];
                            /*eslint no-cond-assign: 0*/
                        } else if (match = entityCode.match(/^#x([\da-fA-F]+)$/)) {
                            return String.fromCharCode(parseInt(match[1], 16));
                            /*eslint no-cond-assign: 0*/
                        } else if (match = entityCode.match(/^#(\d+)$/)) {
                            return String.fromCharCode(~~match[1]);
                        } else {
                            return entity;
                        }
                    });
                };


                var {
                    id,
                    title,
                    message,
                    categoryid,
                    author,
                    text,

                } = temp[0];


                this.post.id = id
                this.post.author = author
                this.post.categoryid = categoryid
                this.post.title = title
                this.post.message = message
                this.temp = unescapeHTML(text);

                console.log(text);
            }
        
    }
});

//Mount
userPostApp.use(CKEditor, Sweetalert2);
const postApp = userPostApp.mount('#post')
