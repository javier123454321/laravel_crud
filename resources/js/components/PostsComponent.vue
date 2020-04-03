<template>
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                {{ post.name }}
            </h2>
        </div>

            <h6 class="muted">
                Created:
                {{ post.created_at.substring(0, 10) }}
            </h6>
            <p class="postBody" v-html="post.body" v-bind="post.body">
            </p>
    </div>
</template>

<script>
    // import luxon;
    export default {
        data: function (){
            return{
                }
            },
        mounted() {
        },
        props: ['post'],
    }
</script>
<style scoped>
.muted{
    color: rgb(153, 153, 153);
}
.postBody{
    margin: 40px 80px;
    max-width: 800px;
}
</style>