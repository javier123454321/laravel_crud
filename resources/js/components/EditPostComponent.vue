<template>
        <div id="container">
            <div class="row justify-content-center">
                <div class="content">
                <h1>Edit Article</h1>

                <form action="" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" :value="csrf">
                    <div class="field">
                        <h4>Post Name:</h4>
                        <input type="text" name="name" placeholder="Post Name..." id="postName" autocomplete="off" :value=this.$attrs.post[0].name>
                    </div>

                    <div class="field">
                        <h4>Post Body:</h4>
                        <textarea name="body" placeholder="Post body..."  id="postBody" :value=this.$attrs.post[0].body>
                        </textarea>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn btn-secondary">
                    </div>
                </form>
                </div>
            </div>
        </div>
</template>
<script>
    export default {
        data: function (){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            },
        mounted(){
            window.console.log(this.$attrs.post[0].body)
        },
        props: ['article']
        }
</script>

<style lang="scss">
.container{
    margin: auto;
    .content{
        margin: auto;
        min-width: 450px;
        width: 80%;
        form{
            min-width: 350px;
        }
    }
}
.field{
    width: 300px;
    margin-bottom: 25px;
    h4{
        text-align: left;
    }
    input, textarea{
        width: 100%;
    }
}
</style>