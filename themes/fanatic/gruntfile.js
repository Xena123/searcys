/*--------------------------------------------------------
| Gruntfile.js
| version: 2.3
| Modified: 23 Febraury 2017
| Author: Geoff Mortstock
|---------------------------------------------------------
|
| Includes watch, browser sync, imagemin, Sass compiling,
| Post-css/prefixes, inlcudes.
| This gruntfile includes two tasks:
|   1) grunt: watch for changes to Html, Sass, and
|   Javascript files
|   2) grunt live: Creates a final minimized build version
|   & creates seperate CSS file for above-the-fold css for
|   faster page load times
|
|---------------------------------------------------------
|
| 1. Grunt Setup
|   a. Create package.json file
npm init
|   b. Install grunt in project directory
npm install grunt --save-dev
|   c. Install plugins
npm install grunt-contrib-watch --save-dev
npm install grunt-contrib-imagemin --save-dev
npm install grunt-contrib-uglify --save-dev
npm install grunt-contrib-sass --save-dev
npm install grunt-postcss --save-dev
|
|---------------------------------------------------------
|
| 2. Gruntfile Setup
|   a. Go project directory
|   b. Import this template into project directory as
|      gruntfile.js.
|      Wordpress: Place under wp-content/
|		   HTML: Place in root of project
|   c. Set up location variables
|       sitePath =
|          Wordpress: path to theme root from where this
|            file live (ex: themes/[theme name])
|          If this files lives in root, use ''
|       buildPath = Location of your build files & partials
|       buildDestPath = Destination where your build files
|         will be compiled (default is root containing this
|         file)
|       watchCSS = Location of Scss files to watch
|       srcCSS = Location of primary Scss file
|       destCSS = Location of CSS file
|       critCSS = Location of above-the-fold css file
|       srcImg = Location of image folder
|       srcJS = Location of uncompressed JS files
|       destJS = Location of final compressed JS file
|
|-------------------------------------------------------*/

module.exports = function( grunt ) {
  /* 2c. Location Variables */
  globalConfig = {
    sitePath: '',
    watchCSS: 'assets/src/sass/**/*.scss',
    srcCSS: 'assets/src/sass/style.scss',
    destCSS: 'assets/css/style.css',
    critCSS: 'assets/css/early.css',
    srcImg: 'assets/img/',
    srcJS: 'assets/src/js/**/*.js',
    destJS: 'assets/js/script.min.js',
  },
/*--------------------------------------------------------
|
| 3. Configure Tasks
|
|-------------------------------------------------------*/
  grunt.initConfig({
    globalConfig: globalConfig,

    pkg: grunt.file.readJSON( 'package.json' ),


    /* Image Minimizer */
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: '<%= globalConfig.sitePath %><%= globalConfig.srcImg %>',
          src: ['**/*.{png,jpg,gif}'],
          dest: '<%= globalConfig.sitePath %><%= globalConfig.srcImg %>',
        }]
      }
    },
    /* Uglify JS */
    uglify: {
      /* Live: Compressed JS */
      live: {
        src: '<%= globalConfig.sitePath %><%= globalConfig.srcJS %>',
        dest: '<%= globalConfig.sitePath %><%= globalConfig.destJS %>',
      },
      /* Dev: Expanded JS */
      dev: {
        options: {
          beautify: true,
          mangle: false,
          compress: false,
          preserveComments: 'all',
        },
        src: '<%= globalConfig.sitePath %><%= globalConfig.srcJS %>',
        dest: '<%= globalConfig.sitePath %><%= globalConfig.destJS %>',
      },
    },
    /* Sass Compiler */
    sass: {
      /* Live: Compressed CSS */
      live: {
        options: {
          sourcemap: 'inline',
          style: 'compressed',
          compass: true
        },
        files: {
          '<%= globalConfig.sitePath %><%= globalConfig.destCSS %>': '<%= globalConfig.sitePath %><%= globalConfig.srcCSS %>'
        },
      },
      /* Dev: Expanded CSS */
      dev: {
        options: {
          sourcemap: 'inline',
          style : 'expanded'
        },
        files: {
          '<%= globalConfig.sitePath %><%= globalConfig.destCSS %>': '<%= globalConfig.sitePath %><%= globalConfig.srcCSS %>'
        },
      },
    },
    /* Post CSS */
    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer')({browsers: ['last 10 versions', 'ie 10']})
        ]
      },
      dist: {
        src: '<%= globalConfig.sitePath %><%= globalConfig.destCSS %>'
      }
    },

    /* Watch */
    watch: {
      css: {
        files: ['<%= globalConfig.sitePath %><%= globalConfig.watchCSS %>'],
        tasks: ['sass:dev','postcss'],
        options: {
          spawn: false,
        }
      },
      php: {
        files: [ '<%= globalConfig.sitePath %><%= globalConfig.srcInc %>*.php' ],
        options : {
          spawn: false
        }
      },
      js: {
        files: ['<%= globalConfig.sitePath %><%= globalConfig.srcJS %>'],
        tasks: [ 'uglify:dev' ],
        options : {
            spawn: false
        }
      },
    },
  });

/*--------------------------------------------------------
|
| 4. Load Plugins
|
|---------------------------------------------------------*/
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-postcss');
/*---------------------------------------------------------
|
| 5. Register Tasks
|
|---------------------------------------------------------*/
  // grunt
  grunt.registerTask('default', ['watch','sass:dev']);
  // grunt live
  grunt.registerTask('live', ['imagemin','sass:live','uglify:live','postcss']);
};
