node('maxcxam') {
    stage('clone') {
        script {
            sh '''
                #!/bin/bash
                if [[ -d ~/maksym_rudenko ]]
                then
                    cd ~/maksym_rudenko && git pull origin m3
                else
                    cd ~ && git clone git@github.com:iteadevops736567/maksym_rudenko.git
                fi
            '''
        }
    }
    stage('work') {
        script {
            sh '''
                #!/bin/bash
                cd ~/maksym_rudenko
                scp app/public/index.html root@128.140.3.174:/var/www/html
            '''
        }
    }
}