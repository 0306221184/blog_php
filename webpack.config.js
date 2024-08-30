const path = require("path");

module.exports = {
  // Other webpack configurations...

  resolve: {
    alias: {
      bootstrap: path.resolve(
        __dirname,
        "./node_modules/bootstrap/dist/js/bootstrap.bundle.js"
      ),
      // Add more aliases as needed
    },
    extensions: [".js"], // Optional: Extensions to resolve
  },

  // More configurations like entry, output, etc.
};
