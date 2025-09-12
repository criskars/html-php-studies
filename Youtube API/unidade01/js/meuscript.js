fetch('../key.json')
    .then(response => response.json())
    .then(data => {
        const YoutubeAPIKey = data.YouTubeAPIKey
        $(document).ready(function () {
            $.get("https://www.googleapis.com/youtube/v3/channels", {
                part: "contentDetails",
                forUsername: "QuadrinhosNaSarjeta",
                key: YoutubeAPIKey
            },
                function (data) {
                    $.each(data.items, (i, item) => {
                        const uploads_id = item.contentDetails.relatedPlaylists.uploads;
                        getUploads(uploads_id);
                    })
                })
            function getUploads(uploadsPlaylistId, pageToken = "") {
                $.get("https://www.googleapis.com/youtube/v3/playlistItems", {
                    part: "snippet",
                    maxResults: 50,
                    playlistId: uploadsPlaylistId,
                    pageToken: pageToken,
                    key: YoutubeAPIKey
                },
                    function (data) {
                        $.each(data.items, (i, item) => {
                            let videoTitle = item.snippet.title;
                            let videoId = item.snippet.resourceId.videoId;
                            let publishedAt = new Date(item.snippet.publishedAt);
                            let description = item.snippet.description;
                            let formattedDate = publishedAt.toLocaleDateString('pt-BR', {
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric'
                            });
                            let videoThumbnail = item.snippet.thumbnails.maxres?.url || item.snippet.thumbnails.standard?.url || item.snippet.thumbnails.high?.url || item.snippet.thumbnails.medium?.url || item.snippet.thumbnails.default?.url;
                            $("#janela").append(`
                            <div class="col-xs-3 col-sm-6 col-md-4 col-xxl-2 text-center"> 
                                <div class="card mb-2 shadow m-1">
                                    <div class="image-container">
                                        <a href="https://www.youtube.com/watch?v=${videoId}" target="_blank"><img src="${videoThumbnail}" class="card-img-top" alt="${videoTitle}"></a>
                                        
                                        <div class="card-img-overlay d-flex flex-column justify-content-end align-items-center text-center">
                                            <p class="card-text">${videoTitle}</p>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-row align-items-center justify-content-between">
                                        <p class="card-text mb-0">Publicado em: ${formattedDate}</p>
                                        <a href="https://www.youtube.com/watch?v=${videoId}" target="_blank" class="btn btn-primary">Assistir</a>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text mb-0">Descrição: ${description}</p>
                                    </div>
                                </div>
                            </div>

                    `);
                        })
                        if (data.nextPageToken) {
                            getUploads(uploadsPlaylistId, data.nextPageToken);
                        }
                    }
                )

            }
        })
    })
    .catch(error => {
        console.error('Erro ao carregar JSON:', error)
    });

$(document).on('click', 'a[href^="https://www.youtube.com"]', function (event) {
    event.preventDefault();

    // Cria o dialog
    const dialog = document.createElement('dialog');
    dialog.style.padding = '0';
    dialog.style.border = 'none';
    dialog.style.position = 'relative';
    dialog.style.overflow = 'visible';

    const closeButton = document.createElement('button');
    closeButton.className = 'btn btn-dark';
    closeButton.textContent = 'X';
    closeButton.style.position = 'absolute';
    closeButton.style.top = '-15px';
    closeButton.style.right = '-15px';
    closeButton.style.zIndex = '2';
    closeButton.style.borderRadius = '50%';
    closeButton.onclick = () => dialog.close();

    // Cria IFRAME do YouTube com src correto
    const videoId = new URL(this.href).searchParams.get('v');
    const iframe = document.createElement('iframe');
    iframe.src = `https://www.youtube.com/embed/${videoId}`;
    iframe.width = "560";
    iframe.height = "315";
    iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
    iframe.setAttribute('frameborder', '0');
    iframe.setAttribute('allowfullscreen', '');

    dialog.append(closeButton);
    dialog.append(iframe);

    dialog.addEventListener('close', ({ target }) => target.remove());
    document.body.append(dialog);
    dialog.showModal();
});

