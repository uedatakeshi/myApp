module.exports = function(grunt) {

    require('time-grunt')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


        phpunit: {
            classes: {
                dir: 'tests/TestCase/'
            },
            options: {
                bin: 'vendor/bin/phpunit',
                bootstrap: 'tests/bootstrap.php',
                colors: true
             }
        },
        phpcs: {
            application: {
                src: ['src/**/*.php']
            },
            options: {
                bin: 'vendor/bin/phpcs',
                standard: 'CakePHP'
            }
        },
        browserify : {
            dist : {
                src : 'src/Scripts/main.js',
                dest : 'webroot/js/build.js'
            }
        },
        uglify: {
            my_target: {
                options: {
                    sourceMap: true
                },
                files: {
                    'webroot/js/build.min.js': ['webroot/js/build.js']
                }
            }
        },
        watch: {
            phpcs: {
                files: ['src/**/*.php'],
                tasks: ['phpcs'],
                options: {
                    spawn: false,
                },
            },
            browserify: {
                files: ['src/Scripts/**/*.js'],
                tasks: ['browserify', 'notify:browserify'],
                options: {
                    spawn: false,
                },
            },
            uglify: {
                files: ['src/Scripts/**/*.js'],
                tasks: ['uglify', 'notify:uglify'],
                options: {
                    spawn: false,
                },
            },
        },
        notify: {
            browserify: {
                options: {
                    message: 'Browserify finished running',
                }
            },
            uglify: {
               options: {
                   message: 'Uglify finished running'
               }
            }
        }
    });

    grunt.loadNpmTasks('grunt-notify');
    grunt.loadNpmTasks('grunt-phpunit');
    grunt.loadNpmTasks('grunt-phpcs');
    grunt.loadNpmTasks('grunt-browserify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('js', ['browserify', 'uglify']);

};
