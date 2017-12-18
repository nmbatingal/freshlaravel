Install Using a PPA

Another way to get the most recent version of Node.js is to add a PPA (Personal Package Archive), which is maintained by NodeSource. If you don't want to use the Node.js version in the APT repositories, this is a good alternative.

Install the PPA. This will give you access to its contents.
For the most recent LTS (the 6.x branch), use:
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
For the older LTS (the 4.x branch), use:
curl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash -
For the currently active release (the 7.x branch), use:
curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash -
The PPA will be added into your APT configuration, and your local package cache will be automatically updated. After you run the setup script from NodeSource, you can then use the previous steps to install the Node.js package with APT.
sudo apt-get install nodejs
 Note: The Node.js package contains the Node.js binary as well as npm, so you don't need to install npm separately. However, in order for some npm packages to work (such as those that require building from source), you will need to install the build-essentials package.

Install build-essentials:
sudo apt-get install build-essential