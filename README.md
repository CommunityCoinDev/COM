CommunityCoin Development, forked from [Peercoin](https://peercoin.net)
==================================

[![Build Status](https://travis-ci.org/CommunityCoinDev/COM.svg?branch=master)](https://travis-ci.org/CommunityCoinDev/COM)

### What is CommunityCoin
The CommunityCoin (COM) is a community based and backed project for numerous different products. The Coin itself is a reward for participating members but can also be regularly bought and sold through different exchanges.

### What is Peercoin?
[Peercoin](https://peercoin.net) (abbreviated PPC), previously known as PPCoin, is the first [cryptocurrency](https://en.wikipedia.org/wiki/Cryptocurrency) design introducing [proof-of-stake consensus](https://peercoin.net/resources.html#whitepaper) as a security model, with a combined [proof-of-stake](https://peercoin.net/resources.html#whitepaper)/[proof-of-work](https://en.wikipedia.org/wiki/Proof-of-work_system) minting system. Peercoin is based on [Bitcoin](https://bitcoin.org), while introducing many important innovations to cryptocurrency field including new security model, energy efficiency, better minting model and more adaptive response to rapid change in network computation power.

### Why did we choose Peercoin?
We're not starting to bring up some new fancy consensus algorithms since that's not our core task. We want to have a proven stable solution that fits our needs which can be used as a base for further development.

### CommunityCoin Resources
* Client and Source:
Client to be released, not official yet
[Source Code](https://github.com/CommunityCoinDev/COM)
* Documentation: [Peercoin Whitepaper](https://peercoin.net/resources.html#whitepaper)
* Help: 
[Website](https://www.communitycoin.world)

## Development:
### Contributing
If you're looking to contribute to our development, please feel free to reach out to us at [dev@communitycoin.world](dev@communitycoin.world) - we'll be happy to answer any questions regarding this matter. For regular support or development questions, please consider the support channels on our website.

### develop (all pull requests should go here)
The develop branch is used by developers to merge their newly implemented features to.
Pull requests should always be made to this branch (except for critical fixes), and could possibly break the code.
The develop branch is therefore unstable and not guaranteed to work on any system.

### master (only updated by group members)
The master branch get's updates from tested states of the develop branch.
Therefore, the master branch should contain functional but experimental code.

### release-* (the official releases)
The release branch is identified by it's major and minor version number e.g. `release-0.6`.
The official release tags are always made on a release branch.
Release branches will typically branch from or merge tested code from the master branch to freeze the code for release.
Only critical patches can be applied through pull requests directly on this branch, all non critical features should follow the standard path through develop -> master -> release-*
