//Constructor for the recommender object
function Recommender(){
    this.description = {};//Holds the keywords
    this.timeWindow = 604800000 ;//Keywords older than this window will be deleted
    this.load();
}

//Adds a keyword to the reommender
Recommender.prototype.addDescription = function(word){
    //Increase count of description
    if(this.description[word] === undefined)
        this.description[word] = {count: 1, date: new Date().getTime()};
    else{
        this.description[word].count++;
        this.description[word].date = new Date().getTime();
    }
    
    console.log(JSON.stringify(this.description));
    
    //Save state of recommender
    this.save();
};


/* Returns the most popular product */
Recommender.prototype.getTopDescription = function(){
    //Clean up old keywords
    this.deleteOldDescription();
    
    //Return word with highest count
    var maxCount = 0;
    var maxDescription = "";
    for(var word in this.description){
        if(this.description[word].count > maxCount){
            maxCount = this.description[word].count;
            maxDescription = word;
        }
    }
    return maxDescription;
};


/* Saves state of recommender. Currently this uses local storage, 
    but it could easily be changed to save on the server */
Recommender.prototype.save = function(){
    localStorage.recommenderDescriptions = JSON.stringify(this.descriptions);
};


/* Loads state of recommender */
Recommender.prototype.load = function(){
    if(localStorage.recommenderDescriptions === undefined)
        this.descriptions = {};
    else
        this.descriptions = JSON.parse(localStorage.recommenderDescriptions);
    
    //Clean up keywords by deleting old ones
    this.deleteOldDescriptions();
};


//Removes keywords that are older than the time window
Recommender.prototype.deleteOldDescriptions = function(){
    var currentTimeMillis = new Date().getTime();
    for(var word in this.descriptions){
        if(currentTimeMillis - this.descriptions[word].date > this.timeWindow){
            delete this.descriptions[word];
        }
    }
};


