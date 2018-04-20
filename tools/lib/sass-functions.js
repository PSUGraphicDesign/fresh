var fs = require('fs'),
    path = require('path'),
    types = require('node-sass').types,
    mime = require('mime');

module.exports = {
  "inline-asset($file)": function(file) {
    var relativePath,
        filePath,
        extension,
        data,
        buffer;

    // Fetch filename/path argument
    relativePath = './' + file.getValue();

    // Resolve absolute path
    filePath = path.resolve(process.cwd(), relativePath);

    // Pop the extension for use in mime lookup
    extension = path.extname(filePath);

    // Read data from file
    data = fs.readFileSync(filePath);

    // Buffers can transform data into various encodings
    buffer = new Buffer(data);

    // Build and return the full data-url
    return types.String('"data:' + mime.getType(extension) + ';base64,' + buffer.toString('base64') + '"');
  }
};
