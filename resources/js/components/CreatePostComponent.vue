<template>
        <div id="container">
            <div class="row justify-content-center">
                <div class="content">
                <h1>New Article</h1>

                <form action="" method="POST">
                    <input type="hidden" name="_token" :value="csrf">
                    <div class="field">
                        <h4>Post Name:</h4>
                        <input type="text" name="name" placeholder="Post Name..." id="postName" autocomplete="off">
                    </div>

                    <div class="field">
                        <h4>Post Body:</h4>
                        <textarea name="body" placeholder="Post body..."  id="postBody">
                        </textarea>
                    </div>
                    <div class="tags">
                        <h4>Topic Tags</h4>
                        <p>Select Multiple:</p>
                        <select name="tagslist[]" multiple>
                            <option v-for="tag in tags" :key="tags" :value="tag.id">
                               {{ tag.tagname }}
                            </option>
                        </select>
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
            },
        props: ["tags"]
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
.tags{
    text-align: left;
    margin-bottom: 20px;
}
</style>