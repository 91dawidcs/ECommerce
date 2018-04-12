//Constructor for the recommender object
function Recommender(){
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
>>>>>>> Stashed changes
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
=======
=======
    this.keywords = {};//Holds the keywords
    this.timeWindow = 10000;//Keywords older than this window will be deleted
    this.load();
}


//Adds a keyword to the reommender
Recommender.prototype.addKeyword = function(word){
    //Increase count of keyword
    if(this.keywords[word] === undefined)
        this.keywords[word] = {count: 1, date: new Date().getTime()};
    else{
        this.keywords[word].count++;
        this.keywords[word].date = new Date().getTime();
    }
    
    console.log(JSON.stringify(this.keywords));
>>>>>>> Stashed changes
>>>>>>> Stashed changes
>>>>>>> Stashed changes
    
    //Save state of recommender
    this.save();
};


<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
>>>>>>> Stashed changes
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
=======
=======
/* Returns the most popular keyword */
Recommender.prototype.getTopKeyword = function(){
    //Clean up old keywords
    this.deleteOldKeywords();
    
    //Return word with highest count
    var maxCount = 0;
    var maxKeyword = "";
    for(var word in this.keywords){
        if(this.keywords[word].count > maxCount){
            maxCount = this.keywords[word].count;
            maxKeyword = word;
        }
    }
    return maxKeyword;
>>>>>>> Stashed changes
>>>>>>> Stashed changes
>>>>>>> Stashed changes
};


/* Saves state of recommender. Currently this uses local storage, 
    but it could easily be changed to save on the server */
Recommender.prototype.save = function(){
<<<<<<< Updated upstream
    localStorage.recommenderDescriptions = JSON.stringify(this.descriptions);
=======
<<<<<<< Updated upstream
    localStorage.recommenderDescriptions = JSON.stringify(this.descriptions);
=======
<<<<<<< Updated upstream
    localStorage.recommenderDescriptions = JSON.stringify(this.descriptions);
=======
    localStorage.recommenderKeywords = JSON.stringify(this.keywords);
>>>>>>> Stashed changes
>>>>>>> Stashed changes
>>>>>>> Stashed changes
};


/* Loads state of recommender */
Recommender.prototype.load = function(){
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
>>>>>>> Stashed changes
>>>>>>> Stashed changes
    if(localStorage.recommenderDescriptions === undefined)
        this.descriptions = {};
    else
        this.descriptions = JSON.parse(localStorage.recommenderDescriptions);
    
    //Clean up keywords by deleting old ones
    this.deleteOldDescriptions();
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
=======
=======
    if(localStorage.recommenderKeywords === undefined)
        this.keywords = {};
    else
        this.keywords = JSON.parse(localStorage.recommenderKeywords);
    
    //Clean up keywords by deleting old ones
    this.deleteOldKeywords();
>>>>>>> Stashed changes
>>>>>>> Stashed changes
>>>>>>> Stashed changes
};


//Removes keywords that are older than the time window
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
>>>>>>> Stashed changes
>>>>>>> Stashed changes
Recommender.prototype.deleteOldDescriptions = function(){
    var currentTimeMillis = new Date().getTime();
    for(var word in this.descriptions){
        if(currentTimeMillis - this.descriptions[word].date > this.timeWindow){
            delete this.descriptions[word];
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
=======
=======
Recommender.prototype.deleteOldKeywords = function(){
    var currentTimeMillis = new Date().getTime();
    for(var word in this.keywords){
        if(currentTimeMillis - this.keywords[word].date > this.timeWindow){
            delete this.keywords[word];
>>>>>>> Stashed changes
>>>>>>> Stashed changes
>>>>>>> Stashed changes
        }
    }
};


