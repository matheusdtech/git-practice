# GIT Practice

Test repo for practicing git workflows with other people.

## Pre-Requisites

- Have git installed
- Create a Github account
- Create an SSH key and import into your Github account
- Fork the repo

# Intuition / Glossary

- **Commit**: A set of changes to files. Points to a previous commit.
- **Branch**: Pointer to a given commit.
- **Remote**: An alias to a remote copy of the repository.
- **Fetch**: Download new data from a remote (but don't do anything with it)

## Helpers

```
# Helper CLI log:
$ alias gl="git log --decorate --oneline --graph --all"
```

# Basic Tasks

## Start from Scratch

```
$ git clone git@github.com:<your github username>/git-practice
```

## Get updates from the official repo

Your fork will only record your own contributions. The _authoritative_ repo is whoever is responsible for managing the _official_ version of the project.

We'll call the _remote_ of the _authoritative_ repo, **upstream**.

```
$ git remote add upstream https://github.com/matheusdtech/git-practice
$ git fetch upstream
```

Whenever you need to grab new data from the authoritative repo:

```
$ git fetch upstream
```

## Start working on a new feature

**Always** start working based on the latest upstream master.

```
$ git fetch upstream
$ git checkout -b feature-alpha upstream/master
```

## While working

Work until you have something to commit. Commit via command line or via IDE:

```
$ git add php/new-file.php
$ git commit -a
```

## Create PR

When ready to submit the work, push stuff to *your* fork to create the PR:

```
$ git push -u origin feature-alpha
# Create the PR in Github
```

## Update PR

If you need to make changes:

```
$ git checkout feature-alpha
# make changes
$ git commit -a
$ git push
```

## Rebase

**If** (and only if) the upstream master has changed in a way that creates a conflict with your code, then you need to rebase onto the latest master:

```
$ git fetch upstream
$ git checkout feature-alpha
$ git branch pre-rebase
$ git rebase -i upstream/master
# fix conflicts in IDE
$ git rebase --continue
$ git push -f
$ git branch -D pre-rebase
```

Line by line, this is:

- Fetching changes from upstream
- Checking out the local feature branch
- Creating a saving point branch (called "pre-rebase") so that if things go very wrong we can easily go back to the old code
- Starting an interactive rebase where you can pick and choose which commits to apply, change them, etc (you can leave out the `-i` if you won't make changes to commit ordering)
- Fixing conflicts and continuing with the rebase until all previous commits are done
- Force pushing the changes so that the PR is updated
- Deleting the old save point, since everything is resolved
