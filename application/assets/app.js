


document.addEventListener('DOMContentLoaded',domloaded,false);
function domloaded(){

    Draw(0);
    
}
function Draw(level) {

    var mainCanvas = document.getElementById("main");  
    
    if(level == 0)
    {
        var mapTile = [
        
            {number:0, x:50, y:200, context:''},
            {number:0, x:105, y:200, context:''},
            {number:0, x:105, y:255, context:''},
            {number:0, x:160, y:255, context:''},
            {number:0, x:215, y:255, context:''},
            {number:0, x:215, y:310, context:''},
            
            
            
        ];
        
        for(var i = 0; i < mapTile.length; i++)
        {
            mapTile[i].number = i+1;
            mapTile[i].context = mainCanvas.getContext("2d");
            mapTile[i].context.fillStyle = "#2DD881";
            mapTile[i].context.fillRect(mapTile[i].x, mapTile[i].y,50,50);
            mapTile[i].context.fillStyle = "#FFFFFF";
            mapTile[i].context.font = "15px Arial";
            mapTile[i].context.fillText(mapTile[i].number, mapTile[i].x+20, mapTile[i].y+30);
        }
            
        
    }
}
