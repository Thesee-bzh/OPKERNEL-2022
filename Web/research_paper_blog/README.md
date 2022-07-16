# Web / Research paper blog

## Challenge (100 points)
Nous avons retrouvé l'identité de l'auteure de l'article. Malheureusement nous ne parvenons pas à la localiser.
Cependant, nous avons découvert qu'elle voyage beaucoup pour participer à diverses conférences et elle est certainement en route vers l'une d'elle.

Sur son site, il est fort probable que l'on puisse accéder à certaines informations qui ne sont pas publiques et qui nous permettraient de savoir quelle est sa prochaine destination.

Bien commencer: Le site met à disposition plusieurs articles. Tous ne sont peut-être pas directement lisible.

## Inputs
- Lise MITNER's research paper blog: `paperblog.challenge.operation-kernel.fr`

## Solution
Going through the research papers, we see that they are fetched using `GET` requests at these `URLs` using a `file ID` as a parameter:
- https://paperblog.challenge.operation-kernel.fr/paper/9 (example)
- https://paperblog.challenge.operation-kernel.fr/maths/1 (example)

So we can iterate through the `file ID`, say from 0 to 30 for instance, like so in a `bash loop`:
```shell
$ for i in {0..30}; do wget paperblog.challenge.operation-kernel.fr/paper/$i; done
```

Then we inspect the `HTML pages` that we fetched to see that the papers are located under `/static/pdf/`:
```shell
$ cat 0

        <div class="group article section align-content-center flex-wrap">
                <embed class="group pt-5" src="/static/pdf/" width="100%" height="100%"/>
        </div>

$ cat 1

        <div class="group article section align-content-center flex-wrap">
                <embed class="group pt-5" src="/static/pdf/math-40942390.pdf" width="100%" height="100%"/>
        </div>
```

Looking at the `paper file name`, we see a special file `conference-75f566a32.pdf`:
```shell
$ grep '/static/pdf' *
0:                <embed class="group pt-5" src="/static/pdf/" width="100%" height="100%"/>
1:                <embed class="group pt-5" src="/static/pdf/math-40942390.pdf" width="100%" height="100%"/>
2:                <embed class="group pt-5" src="/static/pdf/math-237890132.pdf" width="100%" height="100%"/>
3:                <embed class="group pt-5" src="/static/pdf/math-325684357.pdf" width="100%" height="100%"/>
4:                <embed class="group pt-5" src="/static/pdf/math-637821595.pdf" width="100%" height="100%"/>
5:                <embed class="group pt-5" src="/static/pdf/math-922813215.pdf" width="100%" height="100%"/>
6:                <embed class="group pt-5" src="/static/pdf/math-1018544050.pdf" width="100%" height="100%"/>
7:                <embed class="group pt-5" src="/static/pdf/math-1054599111.pdf" width="100%" height="100%"/>
8:                <embed class="group pt-5" src="/static/pdf/math-1125853160.pdf" width="100%" height="100%"/>
9:                <embed class="group pt-5" src="/static/pdf/paper-2f6e09b68666.pdf" width="100%" height="100%"/>
9.1:                <embed class="group pt-5" src="/static/pdf/paper-2f6e09b68666.pdf" width="100%" height="100%"/>
9.2:                <embed class="group pt-5" src="/static/pdf/paper-2f6e09b68666.pdf" width="100%" height="100%"/>
10:                <embed class="group pt-5" src="/static/pdf/paper-6bef11eb7101.pdf" width="100%" height="100%"/>
11:                <embed class="group pt-5" src="/static/pdf/paper-62cde18d8382.pdf" width="100%" height="100%"/>
12:                <embed class="group pt-5" src="/static/pdf/paper-00155d95bd50.pdf" width="100%" height="100%"/>
13:                <embed class="group pt-5" src="/static/pdf/paper-7142c31a253c.pdf" width="100%" height="100%"/>
14:                <embed class="group pt-5" src="/static/pdf/conference-75f566a32.pdf" width="100%" height="100%"/>
(...)
```

Let's grab this file:
```shell
$ wget paperblog.challenge.operation-kernel.fr/static/pdf/conference-75f566a32.pdf
```

The flag waits for us on the first page:

![conference-75f566a32.pdf](./conference-75f566a32.pdf)

## Flag
HACK{Excelsior_Polonium_5E45F6a}