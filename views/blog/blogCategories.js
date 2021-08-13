        //VUE3
        const blogApp = Vue.createApp({
            data() {
                return {
                    id: 1
                }
            },
            methods: {
                async getPosts(event) {
                    this.id = event.target.getAttribute('data-id');
                    window.location = "/cms/anasayfa/" + this.id;
                }
            }
        });

        //Mount
        const userApp = blogApp.mount('#blog')