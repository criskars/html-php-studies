fetch("../key.json")
  .then((response) => response.json())
  .then((data) => {
    const YoutubeAPIKey = data.YouTubeAPIKey;
    $(document).ready(function () {
      $.get(
        "https://www.googleapis.com/youtube/v3/videos",
        {
          part: "statistics",
          id: "loUxtxfps1k",
          key: YoutubeAPIKey,
        },
        function (data) {
          console.log(data);
        }
      );
    });
  });
