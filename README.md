# Easy-Gamemode [![Discord](https://img.shields.io/discord/330850307607363585?logo=discord)](https://discord.gg/EawuF4BPU7)
![](logo.png)

A plugin that allows users to change their gamemode.

## Commands
| Command | Usage | Alias |
| :------------ |:---------------:| -----:|
| gms | /gms | `/survival`, `/0`, `/s`|
| gmc | /gmc | `/creative`, `/1`, `/c`|
| gma | /gma | `/adventure`, `/2`, `/a`|
| gmspc | /gmspc | `/spec`, `/spectator`, `/3`|
| gmui | /gmui | N/A |

## Permissions
| Command  | Permission | Default |
| :------------ |:---------------:| -----:|
|gms|easygamemode.command.gms|op|
|gmc|easygamemode.command.gmc|op|
|gma|easygamemode.command.gma|op|
|gmspc|easygamemode.command.gmspc|op|
|Gamemode UI|easygamemode.command.ui|op|

## Usage
Users need the other `gamemode` permissions to use them in the UI 

**Example**
```yml
permissions:
 - easygamemode.command.gma
 - easygamemode.command.gms
 - easygamemode.command.ui
```
will only allow users to use survival & creative gamemode through the UI

## Suggestions
If you have any suggestion to add onto the plugin, feel free to open an issue on github giving a detailed explanation of what you want to get added. If I feel like the suggestion is good for the plugin, I will add it.

## Issues
Experiencing issues with the plugin? If so please open an issue on Github, I will fix the issue as soon as possible.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
