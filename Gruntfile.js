module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dist: {
                options: {
                    sourcemap: true,
                    style: 'compressed'
                },
                files: {
                    'css/production.min.css': 'css/style.sass'
                }
            }
        },
        uglify: {
            build: {
                src: [
                    'bower_components/jquery/dist/jquery.min.js',
                    'bower_components/bootstrap/dist/js/bootstrap.min.js',
                    'bower_components/underscore/underscore.js',
                    'bower_components/backbone/backbone.js',
                    'js/script.js'
                ],
                dest: 'js/production.min.js'
            }
        },

        command : {
            bower_update: {
                type : 'cmd',
                cmd  : 'bower install'
            },
            cp: {
                type: 'cmd',
                cmd : 'cp bower_components/bootstrap/dist/css/bootstrap.css css'
            }
        },

        watch: {
            configFiles: {
                files: 'Gruntfile.js',
                tasks: ['sass', 'uglify'],
                options: {
                    reload: true,
                    spawn: false
                }
            },
            scripts: {
                files: [
                    'js/*.js',
                    'bower.json'
                ],
                tasks: ['uglify'],
                options: {
                    spawn: false
                }
            },
            styles: {
                files: [
                    'css/*.sass',
                    'bower.json'
                ],
                tasks: ['sass'],
                options: {
                    spawn: false
                }
            },
            bower: {
                files: ['bower.json'],
                tasks: ['command'],
                options: {
                    spawn: false
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-commands');

    grunt.registerTask('default', ['sass', 'uglify', 'command', 'watch']);
};
