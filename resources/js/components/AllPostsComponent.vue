<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>All Posts</h1><br>
        </div>
        
            <button class="btn btn-primary" @click="fetchPosts">fetch Posts</button>
    </div>
</template>

<script>
    // import luxon;
    export default {
        data: function (){
            return{
                posts: null
                }
            },
        methods:{
            fetchPosts: async function(){
            const headers = new Headers({
                    'Content-Type': 'x-www-form-urlencoded',
                    'X-CSRF-TOKEN': this.csrf
                });
                fetch('/posts', {
                    method: 'POST',
                    headers,
                }).then((response)=>{
                    window.console.log(response)
                    return response})
                .then((data) => {
                    this.posts = data[0]
                    window.console.log(data)
                })
                .catch((error)=>{
                    window.console.log(error)
                })
            }
        },
        mounted() {
            // this.fetchPosts();
        },
        props: ['csrf', 'posts'],
    }
</script>
<style scoped>
.muted{
    color: rgb(153, 153, 153);
}
</style>