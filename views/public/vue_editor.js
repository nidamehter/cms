Vue.component('vue-editor', {
    template: "<textarea class='form-control' :name='name'>1</textarea>",
    props: {

        model: {
            required: true
        },
        language: {
            type: String,
            required: false,
            default: "en-US"
        },
        height: {
            type: Number,
            required: false,
            default: 160
        },
        minHeight: {
            type: Number,
            required: false,
            default: 160
        },
        maxHeight: {
            type: Number,
            required: false,
            default: 1000
        },
        name: {
            type: String,
            required: false,
            default: ""
        },
        toolbar: {
            type: Array,
            required: false,
            default: function () {
                return [
                    ["font", ["bold", "italic", "underline", "clear"]],
                    ["fontsize", ["fontsize"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["color", ["color"]],
                    ["insert", ["link", "picture", "hr"]],
                    ['view', ['fullscreen', 'codeview']],
                ];
            }
        }
    },
    created: function () {
    },
    destroyed: function () {

    },
    data: function () {
        return {
            control: "",
        }
    },
    mounted: function () {
        if (this.minHeight > this.height) {
            this.minHeight = this.height;
        }
        if (this.maxHeight < this.height) {
            this.maxHeight = this.height;
        }
        var me = this;
        this.control = $(this.$el);
        this.control.summernote({
            codemirror: {
                theme: 'monokai'
            },
            lang: this.language,
            height: this.height,
            minHeight: this.minHeight,
            maxHeight: this.maxHeight,
            callbacks: {
                onInit: function () {
                    me.control.summernote("code", me.model.content);
                },
                onImageUpload: function (files) {
                    var formData;
                    formData = new FormData();
                    formData.append('file', files[0]);
                    formData.append("param", '{"fileid":' + Math.random() + ',"filetype":"head","filenum":"04' + Math.random() + '"}');
                    $.ajax({
                        url: '/upload/partfile',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).then((res) => {
                        console.log('Res', res);
                        var resdata = res.data;
                        var newInfo = JSON.parse(resdata);
                        newInfo.url += '?t' + Math.random();
                        me.control.summernote('insertImage', newInfo.url, 'img');
                    })

                }
            }
        }).on("summernote.change", function () {
            var content = me.control.summernote("code");
            me.$nextTick(function () {
                me.isChanging = false;
                me.$emit('modelchange', me.model, content);
            });
        });
    },
    methods: {
    },
    watch: {

    }
})
