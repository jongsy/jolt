module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      css: {
        files: [
          'mainsite/sites/all/themes/mm/scss/*.scss'
        ],
        tasks: ['compass']
      },
      js: {
        files: [
          'mainsite/sites/all/themes/mm/scripts/indulge.common.js',
          'Gruntfile.js'
        ],
        tasks: ['jshint']
      },
      images: {
        files: ['mainsite/sites/all/**/*.{png,jpg,gif}'],
        tasks: ['imagemin:single'],
        options: {
        spawn: false,
        }
      }
    },
    compass: {
      dist: {
        options: {
          sassDir: 'mainsite/sites/all/themes/mm/scss',
          cssDir: 'mainsite/sites/all/themes/mm/css',
          outputStyle: 'compressed',
          specify: 'mainsite/sites/all/themes/mm/scss/styles.scss'
        }
      }
    },
    jshint: {
      options: {
        //jshintrc: '.jshintrc'
        //"node": true,
        //"esnext": true,
        //"curly": false,
        //"smarttabs": true,
        //"indent": 2,
        //"quotmark": "single",
        //"globals": {
          //"jQuery": true
        //}
      },
      all: ['mainsite/sites/all/themes/mm/scripts/indulge.common.js1', '!mainsite/sites/all/themes/mm/scripts/*.min.js']
    },
    browser_sync: {
      files: {
        src : [
          'mainsite/sites/all/themes/mm/css/*.css',
          'mainsite/sites/all/themes/mm/images/*',
          'mainsite/sites/all/themes/mm/scripts/*.js',
          '**/*.html'
        ],
      },
      options: {
        watchTask: true,
        host: 'local.martelmaides.co.uk'
      }
    },
    imagemin: {
      png: {
        options: {
          optimizationLevel: 7
        },
        files: [
          {
            // Set to true to enable the following options…
            expand: true,
            // cwd is 'current working directory'
            cwd: 'mainsite/sites/all/',
            src: ['**/*.png'],
            // Could also match cwd line above. i.e. project-directory/img/
            dest: 'mainsite/sites/all/',
            ext: '.png'
          }
        ]
      },
      jpg: {
        options: {
          progressive: true
        },
        files: [
          {
            // Set to true to enable the following options…
            expand: true,
            // cwd is 'current working directory'
            cwd: 'mainsite/sites/all/',
            src: ['**/*.jpg'],
            // Could also match cwd. i.e. project-directory/img/
            dest: 'mainsite/sites/all/',
            ext: '.jpg'
          }
        ]
      }
    }
  });

  // Load the Grunt plugins.
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-imagemin');

  // Register the default tasks.
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('default', ['browser_sync', 'watch']);

};