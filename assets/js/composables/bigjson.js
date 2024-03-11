const fs = require('fs');
// import * as json from 'big-json'
// import {ref} from "vue";

export function useBigJson() {
    function openBigJson(filename) {
        const readStream = fs.createReadStream('../../source-json/' + filename);
        // const parseStream = json.createParseStream();

        // const jsonFile = ref(null);
        // parseStream.on('data', function(data) {
            //jsonFile.value = data;
        // });

        // readStream.pipe(parseStream);

        return { jsonFile: null };
    }
    return { openBigJson }
}
