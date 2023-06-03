console.log("preload");

var imageUrls = [
  "/assets/images/artistes/theophile.jpg",
  "/assets/images/artistes/antoine-clem.jpg",
  "/assets/images/artistes/antoine-leonard.jpg",
  "/assets/images/artistes/beinjamin-prejence.jpg",
  "/assets/images/artistes/duane-forrest.jpg",
  "/assets/images/artistes/ilyes.jpg",
  "/assets/images/artistes/mario.jpg",
  "/assets/images/artistes/peuto.jpg",
  "/assets/images/festival/festival_1-min.jpg",
  "/assets/images/festival/festival_2-min.jpg",
  "/assets/images/festival/festival_3-min.jpg",
  "/assets/images/festival/festival_4-min.jpg",
  "/assets/images/festival/festival_5-min.jpg",
  "/assets/images/festival/festival_6-min.jpg",
  "/assets/images/festival/festival_7-min.jpg",
  "/assets/images/festival/festival_8-min.jpg",
  "/assets/images/festival/festival_9-min.jpg",
  "/assets/images/festival/festival_10-min.jpg",
  "/assets/images/festival/festival_11-min.jpg",
  "/assets/images/festival/festival_12-min.jpg",
  "/assets/images/festival/festival_13-min.jpg",
  "/assets/images/festival/festival_14-min.jpg",
  "/assets/images/festival/festival_15-min.jpg",
  "/assets/images/festival/festival_16-min.jpg"
];
  
// Preload the images
imageUrls.forEach(function(url) {
    var img = new Image();
    img.src = url;
    console.log("url: + " + url);
});
