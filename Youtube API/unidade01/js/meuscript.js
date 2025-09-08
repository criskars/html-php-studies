fetch('../key.json')
    .then(response => response.json())
    .then(data => {
        const YoutubeAPIKey = data.YouTubeAPIKey
        $(document).ready(function () {
            $.get("https://www.googleapis.com/youtube/v3/channels", {
                part: "contentDetails",
                forUsername: "eloycasagrandee",
                key: YoutubeAPIKey
            },
                function (data) {
                    $.each(data.items, (i, item) => {
                        uploads_id = item.contentDetails.relatedPlaylists.uploads;
                        getUploads(uploads_id);
                    })
                })
            function getUploads(uploadsPlaylistId) {
                $.get("https://www.googleapis.com/youtube/v3/playlistItems", {
                    part: "snippet",
                    maxResults: 50,
                    playlistId: uploadsPlaylistId,
                    key: YoutubeAPIKey
                },
                    function (data) {
                        $.each(data.items, (i, item) => {
                            videoTitle = item.snippet.title;
                            videoId = item.snippet.resourceId.videoId;
                            videoThumbnail = item.snippet.thumbnails.maxres.url;
                            $("#janela").append(`
                    <div class="col-12">
                        <div class="card mb-2 shadow">
                            <a href="https://www.youtube.com/watch?v=${videoId}" target="_blank"><img src="${videoThumbnail}" class="card-img-top" alt="${videoTitle}"></a>
                            <div class="card-body">
                                <p class="card-text">${videoTitle}</p>`
                                + `<a href="https://www.youtube.com/watch?v=${videoId}" target="_blank" class="btn btn-primary">Assistir</a>` +
                                `</div>
                        </div>
                    </div>
                    `);
                        })
                    }
                )
            }

        })
    })
    .catch(error => {
        console.error('Erro ao carregar JSON:', error)
    });