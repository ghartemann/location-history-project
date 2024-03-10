const json = require('big-json');
import source from './../../source-json/records.json';

const stringifyStream = json.createStringifyStream({
    body: source
});

stringifyStream.on('data', function(strChunk) {
    // => BIG_POJO will be sent out in JSON chunks as the object is traversed
});
