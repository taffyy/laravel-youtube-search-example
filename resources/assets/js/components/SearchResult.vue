<template>
    <div class="row p-1">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <img class="img-thumbnail" :src="data.snippet.thumbnails.high.url">
                                </div>

                                <div class="col-8">
                                    <h4>{{ data.snippet.title }} </h4>
                                    <p>{{ data.snippet.description }}</p>
                                </div>

                                <div class="col-2 d-flex align-items-center">
                                    <a target="_blank" class="btn btn-primary btn-block" v-if="data.id.kind == 'youtube#video'"
                                    :href="'https://www.youtube.com/watch?v=' + data.id.videoId" >View Video</a>

                                    <a target="_blank" class="btn btn-warning btn-block" v-if="data.id.kind == 'youtube#channel'"
                                    :href="'https://www.youtube.com/channel/' + data.id.channelId" >View Channel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        props: {
            data: {}
        }
    }
</script>
