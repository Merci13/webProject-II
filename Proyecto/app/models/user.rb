class User < ApplicationRecord
  before_create :hash_password
  has_many :sessions
  private
  def hash_password
    require 'digest/md5'
    self.password = Digest::MD5.hexdigest(password)
  end
end
