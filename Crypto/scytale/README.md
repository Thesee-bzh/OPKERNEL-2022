# Crypto / Scytale

## Challenge (100 points)
En fouillant une planque utilisée par des cyber-attaquants, la Police a retrouvé de curieuses bandelettes de papier sur lesquelles sont inscrites des lettres. A quoi peuvent-elles bien servir ?

Bien commencer: Les chiffrements de transposition sont les plus anciens dispositifs de cryptographie militaire connue.

## Inputs
- message: [message.txt](./message.txt)

## Solution
This is a [Scytale](https://fr.wikipedia.org/wiki/Scytale), which can be decoded at ` https://www.dcode.fr/chiffre-scytale` by bruteforcing the size. For size = 5*10, we get the decoded message: `Bien.jouée.le.flag.est.HACK{Th1s_1S_SP4RTAA}.!....`

## Flag
HACK{Th1s_1S_SP4RTAA}