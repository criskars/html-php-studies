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

                            <div class="card mb-2 shadow">
                                <div class="image-container">
                                    <a href="https://www.youtube.com/watch?v=${videoId}" target="_blank"><img src="${videoThumbnail}" class="card-img-top" alt="${videoTitle}"></a>
                                    
                                    <div class="card-img-overlay d-flex flex-column justify-content-end align-items-center text-center">
                                        <p class="card-text">${videoTitle}</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    `
                                    + `<a href="https://www.youtube.com/watch?v=${videoId}" target="_blank" class="btn btn-primary">Assistir</a>` +
                                `</div>
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