module.exports = function(grunt) {

    require('jit-grunt')(grunt);

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        concat: {

            options: {
                separator: ';',
            },

            desktop: {
                src: [

                    // Bower components

                    './bower_components/modernizr/modernizr.js',


                    // Local components

                    // './local_components/dir/dir.js',


                    // Main

                    './build/js/main.js'

                ],
                dest: './content/themes/wp-init/assets/js/wp-init.js',
            },

        },

        uglify: {
            options: {
                banner: '/*\n' +
                    ' * <%= pkg.name %>\n' +
                    ' */\n',
                mangle: false,
                compress: false
            },
            js: {
                files: {
                    './content/themes/wp-init/assets/js/wp-init.min.js': [
                        './content/themes/wp-init/assets/js/wp-init.js'
                    ]
                }
            }
        },

        sass: {
            options: {
                sourceMap: false
            },
            dist: {
                files: {
                    './content/themes/wp-init/style.css': './build/scss/main.scss'
                }
            }
        },

        rsync: {
            options: {
                args: [
                    "-avhzS --progress"
                ],
                exclude: [

                    ".git*",

                    "wp",
                    "build",

                    "bower_components",
                    "node_modules",
                    "local_components",

                    "local-config.php",
                    "package.json",
                    "bower.json",
                    "*.sublime*",

                    "content/cache",
                    "content/plugins",
                    "content/upgrade",
                    "content/uploads"

                ],
                recursive: true
            },
            deploy: {
                options: {
                    src: ".",
                    dest: "~/website.com",
                    host: "username@website.com",
                    delete: false
                }
            },
            pull: {
                options: {
                    src: "username@website.com:~/website.com/",
                    dest: ".",
                    delete: false
                }
            }
        },

        watch: {
            css: {
                files: './build/scss/**/**/**/*.scss',
                tasks: [
                    'sass'
                ]
            },
            js: {
                files: './build/js/**/**/**/*.js',
                tasks: [
                    'js'
                ]
            },
        }

    });

    grunt.registerTask('default', [
        'rsync'
    ]);

    grunt.registerTask('css', [
        'sass'
    ]);

    grunt.registerTask('js', [
        'concat',
        'uglify'
    ]);

    grunt.registerTask('build', [
        'css',
        'js'
    ]);

    grunt.registerTask('deploy', [
        'rsync:deploy'
    ]);

};