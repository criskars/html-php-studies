var nomeCanal = "backtotriangle";
var upload_id;

fetch("../key.json")
  .then((response) => response.json())
  .then((data) => {
    const YoutubeAPIKey = data.YouTubeAPIKey;
    $(document).ready(function () {
      $.get(
        "https://www.googleapis.com/youtube/v3/channels",
        {
          part: "contentDetails",
          forUsername: "QuadrinhosNaSarjeta",
          key: YoutubeAPIKey
        },
        function (data) {
          upload_id = data.items[0].contentDetails.relatedPlaylists.uploads;
          pegarVideos(upload_id);
        }
      );

      function pegarVideos(id) {
        $.get(
          "https://www.googleapis.com/youtube/v3/playlistItems",
          {
            part: "snippet",
            maxResults: 12,
            playlistId: id,
            key: YoutubeAPIKey
          },
          function (data) {
            var imagem;
            var arquivo;

            $.each(data.items, function (i, item) {
              videoId = item.snippet.resourceId.videoId;
              arquivo = "<li></li>";
              $("div#janela ul").append(arquivo);
            });
          }
        );
      }

      function formatarData(data) {
        return (
          data.substr(8, 2) + "/" + data.substr(5, 2) + "/" + data.substr(0, 4)
        );
      }
    });
  });
