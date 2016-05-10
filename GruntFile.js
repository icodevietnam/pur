'use strict';//Chay strict mode

module.exports = function (grunt) {
    grunt.initConfig({
        //Path variables

        //Import package manifest

        pkg: grunt.file.readJSON( "package.json" ),

        // Banner definitions
        meta: {
            banner: "/*\n" +
            " *  <%= pkg.title || pkg.name %> - v<%= pkg.version %>\n" +
            " *  <%= pkg.description %>\n" +
            " *  <%= pkg.homepage %>\n" +
            " *\n" +
            " *  Made by <%= pkg.author.name %>\n" +
            " *  Under <%= pkg.license %> License\n" +
            " */\n"
        },

        paths: {
            //Development where put LESS files, etc
            assets: {
                adminPath  : 'app/Templates/Admin/Assets',
                loginPath : 'app/Templates/Login/Assets',
                defaultPath : 'app/Templates/Default/Assets',
                // Admin Path Assets
                adminCss   : '<%= paths.assets.adminPath %>/css',
                adminJs    : '<%= paths.assets.adminPath %>/js',
                // Login Path Assets
                loginCss   : '<%= paths.assets.loginPath %>/css',
                loginJs   : '<%= paths.assets.loginPath %>/js',
                //defaultPath Assets
                defaultCss   : '<%= paths.assets.defaultPath %>/css',
                defaultJs    : '<%= paths.assets.defaultPath %>/js',
                //Library Vendor
                vendor: 'assets/library',
                build : 'assets/build',
                //main : 'assets/main'
            },

            build: {
                adminCss	  : '<%= paths.assets.build %>/admin/css',
                loginCss	  : '<%= paths.assets.build %>/login/css',
                defaultCss	  : '<%= paths.assets.build %>/default/css',
                adminJs	  : '<%= paths.assets.build %>/admin/js',
                loginJs	  : '<%= paths.assets.build %>/login/js',
                defaultJs	  : '<%= paths.assets.build %>/default/js',
            },

            // Production where Grunt output the files
            main : {
                adminCss		  :'<%= paths.assets.adminCss %>/main',
                loginCss		  :'<%= paths.assets.loginCss %>/main',
                defaultCss		  :'<%= paths.assets.defaultCss %>/main',
                adminJs		  :'<%= paths.assets.adminJs %>/main',
                loginJs		  :'<%= paths.assets.loginJs %>/main',
                defaultJs		  :'<%= paths.assets.defaultJs %>/main',
            }
        },

        // Clean asset files
        clean:	{
            assets: [
                '<%= paths.main.adminJs %>/js/admin.min.js',
                '<%= paths.main.adminJs %>/js/admin.min.js.map',
                '<%= paths.main.loginJs %>/js/login.min.js',
                '<%= paths.main.loginJs %>/js/login.min.js.map',
                '<%= paths.main.defaultJs %>/js/default.min.js',
                '<%= paths.main.defaultJs %>/js/default.min.js.map',
                '<%= paths.main.adminCss %>/css/admin.min.css',
                '<%= paths.main.loginCss %>/css/login.min.css',
                '<%= paths.main.defaultCss %>/css/default.min.css'
            ],
            build: 'build'
        },

        //Minify javascript files
        uglify : {
            loginJs : {
                options: {
                    mangle      : true,
                    compres     : true,
                },
                src: [
                    '<%= paths.assets.build %>/login/js/login.js'
                ],
                dest: '<%= paths.main.loginJs %>/login.min.js'
            },
            adminJs: {
                options: {
                    mangle      : true,
                    compres     : true
                },
                src: [
                    '<%= paths.assets.build %>/admin/js/admin.js'
                ],
                dest: '<%= paths.main.adminJs %>/admin.min.js'
            },
            defaultJs: {
                options: {
                    mangle      : true,
                    compres     : true
                },
                src: [
                    '<%= paths.assets.build %>/default/js/home.js'
                ],
                dest: '<%= paths.main.defaultJs %>/home.min.js'
            }
        },

        jshint: {
            files: [ "<%= paths.assets.build %>/*/js/*.js"],
            options: {
                jshintrc: ".jshintrc"
            }
        },

        jscs: {
            src: "<%= paths.assets.build %>/*/js/*.js",
            options: {
                config: ".jscsrc"
            }
        },

        // Less to css, all less files MUST import to admin.less.
        /*less: {
            less_compile: {
                files: {
                    '<%= paths.assets.css %>/admin.css':'<%= paths.assets.less %>/admin/!*.less'
                },
                home:{
                    '<%= paths.assets.css %>/home.css':'<%= paths.assets.less %>/home/!*.less'
                }
            }
        },*/

        // Concat files.
        concat: {
            loginCss: {
                src: [
                    '<%= paths.assets.loginCss %>/style.css'
                ],
                dest: '<%= paths.build.loginCss %>/login.css'
            },
            loginJs  : {
                options: {
                    seperator: ';',
                    banner: "/!* purshop Software 2015 *!/\n"
                },
                src  : [
                    '<%= paths.assets.vendor %>/jquery/dist/jquery.js',
                    '<%= paths.assets.loginJs %>/index.js'
                ],
                dest : '<%= paths.build.loginJs %>/login.js'
            },
            adminCss : {
                src: [
                    '<%= paths.assets.vendor %>/bootstrap/dist/css/bootstrap.css',
                    '<%= paths.assets.vendor %>/bootstrap/dist/css/bootstrap-theme.css',
                    '<%= paths.assets.vendor %>/fontawesome/css/font-awesome.css',
                    '<%= paths.assets.vendor %>/animatecss/animate.css',
                    '<%= paths.assets.vendor %>/bootstrapswitch/dist/css/bootstrap3/bootstrap-switch.css',
                    '<%= paths.assets.vendor %>/datatablesbootstrap/BS3/assets/css/datatables.css',
                    '<%= paths.assets.vendor %>/bootstrapselect/dist/css/bootstrap-select.css',
                    '<%= paths.assets.vendor %>/datepicker/dist/css/bootstrap-datepicker.css',
                    '<%= paths.assets.adminCss %>/page/*.css'
                ],
                dest: '<%= paths.build.adminCss %>/admin.css'
            },
            adminJs:{
                options: {
                    seperator: ';',
                    banner: "/!* purshop Software 2015 *!/\n"
                },
                src  : [
                    '<%= paths.assets.vendor %>/jquery/dist/jquery.js',
                    '<%= paths.assets.vendor %>/bootstrap/dist/js/bootstrap.js',
                    '<%= paths.assets.vendor %>/bootstrapselect/dist/js/bootstrap-select.js',
                    '<%= paths.assets.vendor %>/datepicker/dist/js/bootstrap-datepicker.js',
                    '<%= paths.assets.vendor %>/bootstrapswitch/dist/js/bootstrap-switch.js',
                    '<%= paths.assets.vendor %>/momentjs/moment.js',
                    '<%= paths.assets.vendor %>/tinymce/js/tinymce/tinymce.min.js',
                    '<%= paths.assets.vendor %>/tinymce/js/tinymce/jquery.tinymce.min.js',
                    '<%= paths.assets.vendor %>/datatablesbootstrap/BS3/assets/js/datatables.js',
                    '<%= paths.assets.vendor %>/datatables/media/js/jquery.dataTables.js',
                    '<%= paths.assets.vendor %>/jqueryvalidation/dist/jquery.validate.js',
                    '<%= paths.assets.vendor %>/metisMenu/dist/metisMenu.js',
                    '<%= paths.assets.vendor %>/slimscroll/jquery.slimscroll.js',
                    '<%= paths.assets.vendor %>/inspina/js/inspina.js',
                    '<%= paths.assets.vendor %>/pace/pace.js',
                ],
                dest : '<%= paths.build.adminJs %>/admin.js'
            },
            defaultCss:{
                src: [
                    '<%= paths.assets.vendor %>/materialize/dist/css/materialize.css',
                    '<%= paths.assets.defaultCss %>/page/*.css'
                ],
                dest: '<%= paths.build.defaultCss %>/home.css'
            },
            defaultJs:{
                src: [
                    '<%= paths.assets.vendor %>/jquery/dist/jquery.js',
                    '<%= paths.assets.vendor %>/momentjs/moment.js',
                    '<%= paths.assets.vendor %>/tinymce/js/tinymce/tinymce.min.js',
                    '<%= paths.assets.vendor %>/tinymce/js/tinymce/jquery.tinymce.min.js',
                    '<%= paths.assets.vendor %>/jqueryvalidation/dist/jquery.validate.js',
                    '<%= paths.assets.vendor %>/materialize/dist/js/materialize.js'
                ],
                dest: '<%= paths.build.defaultJs %>/home.js'
            }
        },

        // Watch change
        /*watch: {
            scripts: {
                files: ['<%= paths.assets.js %>'],
                tasks: ['jshint']
            },
            css: {
                files: ['<%= paths.assets.css %>/!*.css'],
                tasks: ['default']
            }
        },*/

        csscomb: {
            dist: {
                files: {
                    '<%= paths.assets.main %>/*.comb.css': ['<%= paths.assets.main %>/css/*.css']
                }
            }
        },

        cssmin: {
            adminCss: {
                files: {
                    '<%= paths.main.adminCss %>/admin.min.css': ['<%= paths.assets.build %>/admin/css/admin.css']
                }
            },
            defaultCss:{
                files: {
                    '<%= paths.main.defaultCss %>/home.min.css': ['<%= paths.assets.build %>/default/css/home.css']
                }
            },
            loginCss:{
                files: {
                    '<%= paths.main.loginCss %>/login.min.css': ['<%= paths.assets.build %>/login/css/login.css']
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-csscomb');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('build',['clean:assets','concat','uglify','cssmin']);/*, 'concat', 'uglify:prod', 'csscomb', 'cssmin']);*!/*/
    grunt.registerTask('tuantu',['clean:assets','concat','cssmin']);
    grunt.registerTask('admin',['clean:assets','concat:adminJs','concat:adminCss','uglify:adminJs']);
    grunt.registerTask('home',['clean:assets','concat:defaultJs','concat:defaultCss','cssmin:defaultCss']);
    grunt.registerTask('login',['clean:assets','concat:loginJs','concat:loginCss','uglify:loginJs']);
    grunt.registerTask('default',['clean:assets']);
    /*grunt.registerTask('prod', ['jshint', 'clean:assets', 'less', 'concat', 'uglify:prod', 'csscomb', 'cssmin', 'clean:build']);*/
}
