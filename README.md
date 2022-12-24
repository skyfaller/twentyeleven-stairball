# README
This is a [child theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/) of the Wordpress theme [Twenty Eleven](https://wordpress.com/theme/twentyeleven). It was originally created for [Nelson's homepage](https://www.skyfaller.space), then modified for [Stairball.club](https://www.stairball.club/). 

## Font
I use @font-face to import an open source font from [The League of Moveable Type](https://www.theleagueofmoveabletype.com/), specifically [Chunk](https://www.theleagueofmoveabletype.com/chunk), to use in the header.

I'd like to [de-Google-ify my sites](https://markosaric.com/degoogleify/), and [self-hosting seems to provide better performance than Google Fonts](https://www.tunetheweb.com/blog/should-you-self-host-google-fonts/).

## Transitioning away from GitHub
I am planning to [Give up GitHub](https://sfconservancy.org/GiveUpGitHub/). As part of my migration plan, I will begin using [hydra hosting](https://seirdy.one/posts/2020/11/18/git-workflow-1/), setting up multiple git remotes of equal status. Currently I'm using SourceHut, Codeberg, and GitHub, but once I have enough other hosts I'll eliminate GitHub.

You can run `git remote set-url` to switch remote locations if a host goes down. Right now, your options are:

- https://git.sr.ht/~skyfaller/twentyeleven-stairball
- https://codeberg.org/skyfaller/twentyeleven-stairball.git
- https://github.com/skyfaller/twentyeleven-stairball

Collaborators may prefer SSH:

- `git@git.sr.ht:~skyfaller/twentyeleven-stairball`
- `git@codeberg.org:skyfaller/twentyeleven-stairball.git`
- `git@github.com:skyfaller/twentyeleven-stairball.git`

But before pushing any commits, please make sure you know how to fetch from and push to all remotes simultaneously.

## License

This project is licensed under the [GNU General Public License, version 2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html) or any later version at your choice. See the [LICENSE](LICENSE) file for details.

I chose GPLv2 or later to match the license for the parent theme: https://themes.svn.wordpress.org/twentyeleven/4.2/readme.txt
