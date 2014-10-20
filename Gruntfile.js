// Gruntfile.js

// Grunt configuration.
module.exports = function(grunt) {

  // ===========================================================================
  // CONFIGURE GRUNT ===========================================================
  // ===========================================================================
  grunt.initConfig({

    // Get the configuration info from package.json.
    // This way we can use things like name and version (pkg.name).
    // pkg: grunt.file.readJSON('package.json'),

    compass: {
      dist: {
        options: {
          config: 'config.rb'
        }
      }
    },

    watch: {
      options: {
        livereload: true
      },

      compass: {
        files: ['sass/**/*.scss', 'javascripts/**/*.js', '**/*.php'],
        tasks: ['compass']
      }
    }
  });

  // ===========================================================================
  // LOAD GRUNT PLUGINS ========================================================
  // ===========================================================================
  // We can only load these if they are in our package.json.
  // Make sure you have run npm install so our app can find these.
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['watch']);
};
